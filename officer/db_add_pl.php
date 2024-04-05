
<?php

include('../includes/dbconnection.php');

    $comp = $_POST['comp'];

    $sql = "SELECT * FROM comp_tb WHERE comp ='$comp'";
    $query = mysqli_query($con, $sql);

    if(mysqli_num_rows($query) > 0){
        echo '<script> alert("This company name already exists.")</script>';
    }else{
        
    $sql = "INSERT  INTO comp_tb (comp) VALUES ('$comp')";

    $result = mysqli_query( $con, $sql );
    }

?>