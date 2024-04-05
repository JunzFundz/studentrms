<?php

include('../includes/dbconnection.php');

if(isset($_POST['add'])){
    $sessionNew = $_POST['sessionNew'];
    $date = date('y-d-m h:m:s');
    
    $sql = "INSERT INTO session (session, postingdate) VALUES ('$sessionNew', '$date')";
    if (mysqli_query($con,$sql)) {
        echo '<script type="text/javascript">';
        echo 'alert("Session added");';
        echo 'window.location.href = "session.php" ';
        echo '</script>';
    }
}