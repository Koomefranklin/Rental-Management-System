<?php
require 'include/db.inc';

$query = "CREATE VIEW IF NOT EXISTS active_clients AS SELECT fname, sname, clients.housename, housetype FROM clients, houses WHERE clients.housename = houses.housename";
mysqli_query($conn, $query);

$results = mysqli_query($conn, "SELECT * FROM active_clients");
while ($row = mysqli_fetch_assoc($results)) {
    echo $row["fname"] . "<br>" . $row["sname"] . "<br>" . $row["housetype"] . "<br>" . $row["housename"];
}

?>