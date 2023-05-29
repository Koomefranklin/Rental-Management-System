<?php
require "include/session.inc";
echo '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous">
<link  rel="stylesheet" href="css/base.css">
<link rel="apple-touch-icon" sizes="180x180" href="Images/icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="Images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="Images/icons/favicon-16x16.png">
<link rel="manifest" href="Images/icons/site.webmanifest">
<script type="text/javascript" src="include/functions.js">
</script>
<div class="overlay">
<header>
  Rental House Management
</header>
<div class="sidebar" id="sidebar">
<ul>
  <li><a href="home.php"><i class="glyphicon glyphicon-home"></i>Home</a></li>
  <li><a href="addhouse.php">Add Property</a></li>
  <li><a href="addclient.php">New Client</a></li>
  <li><a href="tenants.php">Tenants</a></li>
  <li id="logout" style="padding: 10px; cursor: pointer">Logout</li>
</ul>
</div>
<script>
window.onload = setActive;
logout();
</script>';
