<?php

include('../includes/dbconnection.php');

if(isset($_POST['check_session'])){
    $id = $_POST['editSession'];

    $sql = "SELECT * FROM session WHERE id='$id'";
    $result  = mysqli_query($con, $sql);

    $data_array = [];

    if(mysqli_num_rows($result)>0){
        foreach($result as $row){
            array_push($data_array, $row);
            header('Content-Type: application/json');
            echo json_encode($data_array);
        }
    }
    else {
        echo "Error! No Data Found.";
    }
}