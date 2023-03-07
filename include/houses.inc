<?php

function bedSitter(){
    require 'db.inc';
    $query = "SELECT housename, monthlyrent FROM houses WHERE housetype = 'bedsitter' AND occupied = 'false'";
    $getBedsitters = mysqli_query($conn, $query);
    if (mysqli_num_rows($getBedsitters) > 0) {
        $houses = 1;
        while ($row = mysqli_fetch_assoc($getBedsitters)) {
            $housename = $row['housename'];
            $rent = $row['monthlyrent'];
            echo '
            
            const option'.$houses.' = document.createElement("option");
            var housename = "'. $housename .'";
            var rent = '.$rent.';
            option'.$houses.'.value = housename;
            option'.$houses.'.textContent = housename;
            houserents[housename] = rent;
            
            houseName.appendChild(option'.$houses.');
            
            ';
            $houses += 1;
        }
    } else {
        echo '"No empty bedsitters"';
    }
    mysqli_close($conn);
}


function onebr(){
    require 'db.inc';
    $query = "SELECT housename, monthlyrent  FROM houses WHERE housetype = '1 Bedroom' AND occupied = 'false'";
    $get1BRs = mysqli_query($conn, $query);
    if (mysqli_num_rows($get1BRs) > 0) {
        $houses = 1;
        while ($row = mysqli_fetch_assoc($get1BRs)) {
            $housename = $row['housename'];
            $rent = $row['monthlyrent'];
            echo '
            const option'.$houses.' = document.createElement("option");
            var housename = "'. $housename .'";
            var rent = '.$rent.';
            option'.$houses.'.value = housename;
            option'.$houses.'.textContent = housename;
            houserents[housename] = rent;
            
            houseName.appendChild(option'.$houses.');

            ';
            $houses += 1;
        }
    } else {
        echo '"No empty 1 Bedrooms"';
    }
}


function twobr(){
    require 'db.inc';
    $query = "SELECT housename, monthlyrent  FROM houses WHERE housetype = '2 Bedroom' AND occupied = 'false'";
    $get2BRs = mysqli_query($conn, $query) ;
    if (mysqli_num_rows($get2BRs) > 0) {
        $houses = 1;
        while ($row = mysqli_fetch_assoc($get2BRs)) {
            $housename = $row['housename'];
            $rent = $row['monthlyrent'];
            echo '
            const option'.$houses.' = document.createElement("option");
            var housename = "'. $housename .'";
            var rent = '.$rent.';
            option'.$houses.'.value = housename;
            option'.$houses.'.textContent = housename;
            houserents[housename] = rent;
            
            houseName.appendChild(option'.$houses.');

            ';
            $houses += 1;
        }
    } else {
        echo '"No empty 2 Bedrooms"';
    }
}