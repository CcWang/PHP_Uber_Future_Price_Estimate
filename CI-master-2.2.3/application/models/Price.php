<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price extends CI_Model {
  public function insertPrices($data,$route)
  {
   $query = "INSERT INTO prices (display_name, low_estimate,high_estimate,surge_multiplier,date,route_id) VALUES (?,?,?,?,now(),?)";
   $values = array($data->display_name,$data->low_estimate,$data->high_estimate,$data->surge_multiplier,$route);
   $this->db->query($query,$values);
  }

  public function findRoute($location)
  {

    $query = "SELECT id FROM routes WHERE (start_la between ? AND ? ) ".
            "AND (start_lon between ? AND ? ) ".
            "And (end_la between ? AND ? ) ".
            "AND (end_lon between ? AND ? )";
    $values = $location;
    return $this->db->query($query, $values)->row_array();
  }

  public function findPrice($compare)
  {
    $query = "SELECT display_name, surge_multiplier, date_format(date, '%H:%i') as date FROM prices WHERE (route_id = ?) AND (display_name = ?) ". 
              "AND (date_format(prices.date, '%a') = ?) AND ".
              "(date_format(prices.date, '%H') between ? and ?)";
    return $this->db->query($query,$compare)->result_array();
  }



}
?>