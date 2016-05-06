<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {

  public function compare()
  {
  	$post = $this->input->post();
    $message = array();
    //find the route
    $location = array();
    $location[0] = $post['location'][0] - 0.06;
    $location[1] = $post['location'][0] + 0.06;
    $location[2] = $post['location'][1] - 0.06;
    $location[3] = $post['location'][1] + 0.06;
    $location[4] = $post['location'][2] - 0.06;
    $location[5] = $post['location'][2] + 0.06;
    $location[6] = $post['location'][3] - 0.06;
    $location[7] = $post['location'][3] + 0.06;
    $id = $this->Price->findRoute($location);
    if ($id == null) {
      $message['noRoute'] = "Future price estimate feature is building...";
    }else {
      //find the future estimate price
      $dt = new DateTime("now", new DateTimeZone('America/Los_Angeles'));
      $dt->setTimestamp(time());
      $compare = array();
      $compare['route'] = $id['id'];
      $compare['select_uber'] = $post['select_uber'];
      $compare['day'] = $dt->format("D");
      $compare['time'] = $dt->format("H");
      $compare['time1'] = $compare['time']+2;
      // log_message('error',json_encode($compare));
      $resultes = $this->Price->findPrice($compare);
      if ($resultes == null) {
        $message['noData'] = "We are data mining...";
      }else {
        $times = array();
        $want_time = false;
        foreach ($resultes as $values) {
          foreach ($values as $key => $value) {
            if ($key == 'surge_multiplier' && $value > 1) {
              $want_time = true;
            }
          }
          if ($want_time) {
            $alarms['time'] = $values['date'];
            $alarms['surge'] = $values['surge_multiplier'];
            // $hour = explode(' ', $values['date'])[1];
            // $alarms[] = 'Around ' . $values['date']. " Uber Surge Pricing may increae to ". $values['surge_multiplier']."! ";
            array_push($times,$alarms);
            
            // $times[$hour] = $values['surge_multiplier'];
            $want_time = false;
          }
        }
        if ($times) {
          $message['alarm'] = $times;
        }else {
          $message['noAlarm'] = 'In two hours, the Uber price will not increase.';
        }

      }
      
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($message));
    // echo json_encode($message);
  	// log_message('error',json_encode($message));
  }
}
?>