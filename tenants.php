<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Clients</title>
    </head>
    <body>
        <?php require "include/menu.inc";?>
            <div class="current-tenants">
                <?php
                require "include/db.inc";
                $query = "CREATE VIEW IF NOT EXISTS active_clients AS SELECT sir_name, first_name, phone, location, monthlyrent, total_rent, paid_rent, balance, clients.housename, housetype FROM clients, houses WHERE clients.housename = houses.housename AND clients.tenancy = true";
                mysqli_query($conn, $query);

                $client_query = "SELECT sir_name, first_name, phone, location, monthlyrent, total_rent, paid_rent, balance, housename, housetype FROM active_clients";
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
                                    ' . $row["sir_name"] . ' ' . $row["first_name"] .'
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
                            <div class="row">
                                <div class="title">
                                    Total Rent:
                                </div>
                                <div class="content">
                                    ' . $row["total_rent"] .'
                                </div>
                            </div>
                            <div class="row">
                                <div class="title">
                                    Paid Rent:
                                </div>
                                <div class="content">
                                    ' . $row["paid_rent"] .'
                                </div>
                            </div>
                            <div class="row">
                                <div class="title">
                                    Balance:
                                </div>
                                <div class="content">
                                    ' . $row["balance"] . '
                                </div>
                            </div>
                            <div class="row">
                                <form method="post" action="include/vacate.php">
                                <input type="hidden" name="house-name" value="' . $row["housename"] . '">
                                <button type="submit" onclick="return confBox(event)">Vacate Client</button>
                                </form>
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