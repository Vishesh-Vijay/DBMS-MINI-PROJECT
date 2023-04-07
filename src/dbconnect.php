<?php
   
    $servername = "localhost"; 
    $username = "root"; 
    $password = "vishesh@8220";
   
    $database = "Organ_Donation";
     $conn = mysqli_connect($servername, 
         $username, $password, $database);

    if(!$conn) {
        die("Error". mysqli_connect_error()); 
    } 
?>