<?php require 'include/session.inc'?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Property</title>
        <style>

        </style>
    </head>
    <body>
        <?php include 'include/menu.inc';?>
        <div class="overlay">
            <div class="property-form">
                <div class="form-header">Add New Property</div>
                <form action="#" method="post">
                    <label for="house-type">House Type</label>
                    <select id="house-type" name="house-type" required>
                        <option value="" default select title="Please Select a house type">Select House Type</option>
                        <option value="Bedsitter">Bedsiter</option>
                        <option value="1 Bedroom">1 Bedroom</option>
                        <option value="2 Bedroom">2 Bedroom</option>
                    </select><br>
                    <label for="house-name">House Name</label>
                    <input type="text" id="house-name" name="house-name" required><br>
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" required><br>
                    <label for="rent">Monthly Rent</label>
                    <input type="number" id="rent" name="rent" required><br>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Short description of the house" rows="4" required></textarea><br>
                    <button type="submit">ADD</button>
                </form>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require 'include/addhouse.inc';
                    }?>
            </div>
        </div>
    </body>
</html>