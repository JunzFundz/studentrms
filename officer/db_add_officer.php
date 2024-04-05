
<?php

include('../includes/dbconnection.php');

    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_login WHERE loginid ='$user'";
    $query = mysqli_query($con, $sql);

    if(mysqli_num_rows($query) > 0){
        echo '<script> alert("Username exists.")</script>';
    }else{
        
    $sql = "INSERT INTO tbl_login (loginid, password) VALUES ('$user','$password')";

    $result = mysqli_query( $con, $sql);
    }


?>