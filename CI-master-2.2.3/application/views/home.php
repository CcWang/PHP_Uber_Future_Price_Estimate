<!DOCTYPE html>
<html>

<head>
  <meta charset = 'utf-8'>
  <title>Silicon Valley Traveler</title>  
<script src = 'https://code.jquery.com/jquery-2.1.3.min.js'></script>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/home.css">
<link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
</head>
<body class=" teal lighten-3">
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
  <div class="header_img" id='content'>
    <section>
      <div class="container">
        <div class="row">
          <div class="col s7 offset-s5" id="words">
            <h3>Find the best way to get around Silicon Valley</h3>
            <a href="/nav"><i class="material-icons left">navigation</i><h4>Let's Go</h4></a>
          </div>
        </div>
      </div>
    </section>
  </div>
 
  <div class="row">
    <div id="map">
      <script>

        var map;
        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 37.628, lng: -122.378},
            scrollwheel: false,
            zoom: 10
          });
        }

      </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlx58-OS5jPeJuM8b1g7opLr7VSP-2zAs&callback=initMap"
        async defer></script>
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