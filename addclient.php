<?php require 'include/session.inc';
    require 'include/houses.inc';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Client</title>
        <script type = "text/javascript" src="include/functions.js"></script>
        <script type="text/javascript">
            function emptyHouses(){
                const houseType = document.getElementById('property_type');
                const houseName = document.getElementById('housename');
                const monthlyrent = document.getElementById("rent");
                houseType.addEventListener('change', function(){
                    const selectedValue = this.value;
                    houseName.innerHTML = '';
                    monthlyrent.value = '';
                    const option = document.createElement("option");
                    option.textContent = "Select House";
                    houseName.appendChild(option);
                    const houserents = {};
                    if (selectedValue === 'Bedsitter') {
                        <?php bedSitter();?>;
                    } else if (selectedValue === '1 Bedroom'){
                        <?php onebr();?>;
                    } else if (selectedValue === '2 Bedroom'){
                        <?php twobr();?>;
                    }
                    houseName.addEventListener('change', function() {
                        const selectedHouse = this.value;
                        const rentarray = Object.keys(houserents);
                    
                        
                        monthlyrent.value = houserents[selectedHouse];
                        
                    });
                    return houserents;
                    });
                
            }
            
            // // Get the values of the query parameters
            // const urlParams = new URLSearchParams(window.location.search);
            // const housetype = urlParams.get('housetype');
            // const housename = urlParams.get('housename');
            // const monthlyrent = urlParams.get('montlyrent');

            // // Set the values in the input elements of the second form
            // document.getElementById('property_type').value = housetype;
            // document.getElementById('housename').value = housename;
            // document.getElementById('monthlyrent').value = monthlyrent;
        </script>
    </head>
    <body>
    <?php include 'include/menu.inc';?>
    <div class="overlay">
        
        <div class="client-form">
            <span class="form-header">New Client</span>
            <form action="#" method="post">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="required" required autofocus>
                <label for="sname">Sir Name</label>
                <input type="text" id="sname" name="sname" placeholder="required" required>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="optional">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="required" required>
                <label for="property_type">Property Type</label>
                <select id="property_type" name="property_type" required>
                    <option default>Select House Type</option>
                    <option value="Bedsitter">Bedsiter</option>
                    <option value="1 Bedroom">1 Bedroom</option>
                    <option value="2 Bedroom">2 Bedroom</option>
                </select>
                <label for="housename">House Name</label>
                <select id="housename" name="housename">
                    <option default>Select Name</option>
                </select>
                <label for="rent">Monthly Rent</label>
                <input type="number" id="rent" name="rent" readonly required>
                <script type="text/javascript">emptyHouses()
                </script>
                <button type="submit" id="add">ADD</button>
            </form>
            <div>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require "include/addclient.inc";
                        }
                ?>
            </div>
        </div>
    </div>
    </body>
</html>