<?php

include('../includes/dbconnection.php');

if(isset($_POST['change'])){
    $sessionID = $_POST['sessionID'];
    $sessionNew = $_POST['sessionNew'];
    
    $sql = "UPDATE session SET session= '$sessionNew' WHERE id='$sessionID'";
    if (mysqli_query($con,$sql)) {
        echo '<script type="text/javascript">';
        echo 'alert("Succesfully updated");';
        echo 'window.location.href = "session.php" ';
        echo '</script>';
    }
}