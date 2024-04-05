<?php 
include('../includes/dbconnection.php');

if(isset($_POST['passed'])){
    $id = $_POST[ 'id'];

    $stmt = "UPDATE second_sem SET student_status = 'PASSED' WHERE student_id = '$id'";
    $result = mysqli_query($con, $stmt);

    if($result){
        $stmt = "UPDATE student_info SET status='COMPLETED' WHERE id ='$id' ";
        $result = mysqli_query($con, $stmt);

        if($result){
            $response = [
                'success' => 'Success'
            ];
        } else {
            $response = [
                'error' => 'Something went wrong while updating student info'
            ];
        }
    } else {
        $response = [
            'error' => 'Something went wrong while updating student status'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit; 
}

if(isset($_POST['dropped'])){
    $id = $_POST[ 'id'];

    $stmt = "UPDATE second_sem SET student_status = 'DROPPED' WHERE student_id = '$id'";
    $result = mysqli_query($con, $stmt);

    if($result){
        $stmt = "UPDATE student_info SET status='DROPPED' WHERE id ='$id' ";
        $result = mysqli_query($con, $stmt);

        if($result){
            $response = [
                'success' => 'Success'
            ];
        } else {
            $response = [
                'error' => 'Something went wrong while updating student info'
            ];
        }
    } else {
        $response = [
            'error' => 'Something went wrong while updating student status'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit; 
}

if(isset($_POST['droppedf'])){
    $id = $_POST[ 'id'];

    $stmt = "UPDATE first_sem SET student_status = 'DROPPED' WHERE student_id = '$id'";
    $result = mysqli_query($con, $stmt);

    if($result){
        $stmt = "UPDATE student_info SET status='DROPPED' WHERE id ='$id' ";
        $result = mysqli_query($con, $stmt);

        if($result){
            $response = [
                'success' => 'Success'
            ];
        } else {
            $response = [
                'error' => 'Something went wrong while updating student info'
            ];
        }
    } else {
        $response = [
            'error' => 'Something went wrong while updating student status'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit; 
}
?>
