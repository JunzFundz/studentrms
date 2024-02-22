
<?php

include('../includes/dbconnection.php');

    $platoon = $_POST['platoon'];

    $sql = "SELECT * FROM platoons_tb WHERE platoons ='$platoon'";
    $query = mysqli_query($con, $sql);

    if(mysqli_num_rows($query) > 0){
        echo '<script> alert("This platoon name already exists.")</script>';
    }else{
        
    $sql = "INSERT  INTO platoons_tb (platoons) VALUES ('$platoon')";

    $result = mysqli_query( $con, $sql );
    echo '<script> alert("Platoon added.")</script>';
    }


?>