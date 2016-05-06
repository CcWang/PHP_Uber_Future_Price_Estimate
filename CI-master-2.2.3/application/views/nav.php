<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SVTraveler_Start</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<script src = 'https://code.jquery.com/jquery-2.1.3.min.js'></script>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="assets/nav.css">
  </head>

  <body class="teal linghten-3">
    <header class='header'>
      <nav class='z-depth-0 teal lighten-1'>
        <div class="row">
          <div class="col s12 l3">
            <a href="/" >
              <img src="assets/logo.png" id="logo">
              <h5>SVtraveler</h5>
            </a>
          </div>
          <div class="col l9 hide-on-med-and-down right-align desktop-nav">
            <ul class="right">
              <li><a href="/">Home</a></li>
              <li><a href="/">How It Works</a></li>
              <li><a href="/">Feedback</a></li>
            </ul>
          </div>
        </div>
        
      </nav>
    </header>
    <div class='container' id="start">
      <h3>Where do you want to go</h3>
      <form action="/Map/direction" method="post">
        <label>From: 
        <input type="text" name="from" />
        </label>
        <label>To:
        <input type="text" name="destination">
        </label>
        <input type="submit" value="Leave Now! ">
        <input type="hidden" id = 'uber' value="/Map/get_price">
      </form>
    </div>
    <div id="loading"></div>
    <div id="results">
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header">Public Transit</div>
          <div class="collapsible-body"><p id="result">Enter locations, and press 'Leave Now'.</p></div>
        </li>
        <li>
          <div class="collapsible-header">Uber</div>
          <div class="collapsible-body"><p id="uberResult">Enter locations, and press 'Leave Now'.</p></div>
        </li>
      </ul>
    </div>
    <script type="text/javascript" src="assets/main.js"></script>
    <div id="map"></div>
    <script src='assets/map.js'></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlx58-OS5jPeJuM8b1g7opLr7VSP-2zAs&signed_in=true&callback=initMap"
      async defer>
    </script>

    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Uber price estimate</h4>
        <p id="alarm"></p>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK!</a>
      </div>
    </div>

    <footer class="page-footer teal lighten-3">
      <div class="footer-copyright">
        <div class="container">
        © 2016 CC LAMP Project
        <a class="grey-text text-lighten-4 right" href="/">Thank You</a>
        </div>
      </div>
    </footer>
  </body>
</html>