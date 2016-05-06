<!DOCTYPE html>
<html>
<head>
  <meta charset = 'utf-8'>
  <title>Access</title>
<style type="text/css">
  .search{
    display: inline-block;
    vertical-align: top;
  }
  table {
    border-collapse: collapse;
  }

  table, th, td {
    border: 1px solid black;
  }
  * {
    margin: 5px;
    padding: 5px;
  }
</style>
</head>
<body>
<h3>From SFO STANDFORD UNIVERSITY</h3>
  <form action="/main/get_price" method="post" class="search">
    <label for="user_input">Price & Time Estimate:</label>
    <label>From: 
      <input type="text" name="start_address" placeholder = 'start_address'/>
      
    </label>
    <label> To: 
      <input type="text" name="end_address" placeholder = 'end_address' />
    </label>
    <input type="submit" value="search">
  </form>
<h3>From STANDFORD UNIVERSITY TO sfo </h3>
  <form action="/main/get_price" method="post" class="search">
    <label for="user_input">Price & Time Estimate:</label>
    <label>From: 
      <input type="text" name="start_latitude" placeholder = 'start_latitude'/>
      <input type="text"  name="start_longitude" placeholder = 'start_longitude' />
    </label>
    <label> To: 
      <input type="text" name="end_latitude" placeholder = 'end_latitude' />
      <input type="text"  name="end_longitude" placeholder = 'end_longitude' />
    </label>
    <input type="submit" value="search">
  </form>
</body>
</html>
