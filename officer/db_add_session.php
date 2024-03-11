<?php

include('../includes/dbconnection.php');

if(isset($_POST['add'])){
    $sessionNew = $_POST['sessionNew'];
    
    $sql = "INSERT INTO session (session) VALUES ('$sessionNew')";
    if (mysqli_query($con,$sql)) {
        echo '<script type="text/javascript">';
        echo 'alert("Session added");';
        echo 'window.location.href = "session.php" ';
        echo '</script>';
    }
}