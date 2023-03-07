<? include "include/session.php";?>
<!DOCTYPE html>
<html>
    <head>
        <title>Clients</title>
    </head>
    <body>
        <?php require "include/menu.inc";?>
        <div class="overlay">
            <div class="current-tenants">
                <?php
                require "include/db.inc";
                $query = "CREATE VIEW IF NOT EXISTS active_clients AS SELECT tenancy, fname, sname,phone, location, monthlyrent, clients.housename, housetype FROM clients, houses WHERE clients.housename = houses.housename";
                mysqli_query($conn, $query);

                $client_query = "SELECT fname, sname, phone, location, monthlyrent, housename, housetype FROM active_clients WHERE tenancy = true";
                $result = mysqli_query($conn, $client_query);

                // check that the view is not empty before any queries on it
                if (mysqli_num_rows($result) > 0){
                // loop through all records and output them in a page
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="card">
                            <div class="row">
                                <div class="title">
                                    Name:
                                </div>
                                <div class="content">
                                    ' . $row["sname"] . ' ' . $row["fname"] .'
                                </div>
                            </div>
                            <div class="row">
                                <div class="title">
                                    Phone:
                                </div>
                                <div class="content">
                                    ' . $row["phone"] .'
                                </div>
                            </div>
                            <div class="row">
                                <div class="title">
                                    House Type:
                                </div>
                                <div class="content">
                                    ' . $row["housetype"] .'
                                </div>
                            </div>
                            <div class="row">
                                <div class="title">
                                    House Name:
                                </div>
                                <div class="content">
                                    ' . $row["housename"] .'
                                </div>
                            </div>
                            <div class="row">
                                <div class="title">
                                    Location:
                                </div>
                                <div class="content">
                                    ' . $row["location"] .'
                                </div>
                            </div>
                            <div class="row">
                                <div class="title">
                                    Monthly Rent:
                                </div>
                                <div class="content">
                                    ' . $row["monthlyrent"] .'
                                </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo 'No Occupied Houses';
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </body>
</html>