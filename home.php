<?php require 'include/session.inc'?>
<!DOCTYPE html>
<html >
    <head>
        <title>RMS Home</title>
        <style>
            .output {
                text-align: center;
            }
        </style>
        <script>
            function fillClientForm() {
                // Get the values from the first page
                const housetype = document.getElementById('housetype').value;
                const housename = document.getElementById('housename').value;
                const monthlyrent = document.getElementById('monthlyrent').value;

                // Set the values in the URL of the second page
                const url = 'addclient.php?housetype=' + encodeURIComponent(housetype) + '&housename=' + encodeURIComponent(housename) + '&monthlyrent=' + encodeURIComponent(monthlyrent);

                // Navigate to the second page
                window.location.href = url;
            }
        </script>
    </head>
    <body>
    <?php require 'include/menu.inc';?>
    <div class="overlay">
        <div class="output">
            <div class="available-houses">
            <?php require 'include/db.inc';
            $query = "SELECT * FROM houses WHERE occupied = false";
            $file = mysqli_query($conn, $query);
            if (mysqli_num_rows($file) > 0) {
                while ($row = mysqli_fetch_assoc($file)) {
                    echo '
                        <div class="card">
                            <div class="row">
                                <div class="title">
                                    Type:
                                </div>
                                <div class="content" id="housetype">'
                                    .$row['housetype']
                                .'</div>
                            </div>
                            <div class="row">
                                <div class="title">
                                    Name:
                                </div>
                                <div class="content" id="housename">'
                                    .$row['housename']
                                .'</div>
                            </div>
                            <div class="row"> 
                                <div class="title">
                                    Rent:
                                </div>
                                <div class="content" id="monthlyrent">'
                                    .$row['monthlyrent']
                                .'</div>
                            </div>
                            <div class="description-title">
                                Description
                            </div>
                            <div class="description-content">'
                                .$row['description']
                            .'</div>
                        </div>
                            ';
                }
                echo '</div>';
            } else {
                echo 'No unoccupied houses<br>';
            }
            ?>
        </div>
    </div>
</body>
</html>
