<?php
echo '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link  rel="stylesheet" href="css/base.css">
<script type="text/javascript" src="include/functions.js">
</script>
<div class="nav-bar">
  Rental House Management
</div>
<div class="sidebar">
<ul>
<li><a href="home.php"><i class="glyphicon glyphicon-home"></i>Home</a></li>
  <li><a href="addhouse.php">Add Property</a></li>
  <li><a href="addclient.php">New Client</a></li>
  <li><a href="clients.php">Tenants</a></li>
  <li><a href="#">Billing</a></li>
  <li><a id="logout" onclick="logout()">Logout</a></li>
</ul>
</div>';
