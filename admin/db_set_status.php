<?php
include('../includes/dbconnection.php');

if (isset($_POST['first'])) {
    $id = $_POST['id'];

    $check = "SELECT * FROM second_sem WHERE student_id='$id'";
    $result = mysqli_query($con, $check);

    if (mysqli_num_rows($result) > 0) {
        $response = [
            'error' => 'Student already enrolled'
        ];
        return false;
    } else {
        $stmt = "UPDATE first_sem SET student_status = 'PASSED' WHERE student_id = '$id'";
        $result = mysqli_query($con, $stmt);

        if ($result) {
            $select = "SELECT reg_no, session, comp FROM student_info WHERE id='$id'";
            $result = mysqli_query($con, $select);

            $row = mysqli_fetch_assoc($result);
            $regno = $row['reg_no'];
            $session = $row['session'];
            $company = $row['comp'];
            $full_name = $row['fname'] . " " . $row['mi'] . ". " . $row['lname'];

            $insertSecondSem = "INSERT INTO second_sem (session, company, student_id, student_reg_number, student_name, date_enrolled, student_status) VALUES ('$session', '$company', '$id', '$regno', '$full_name', NOW(), 'ONGOING')";

            $newresult = mysqli_query($con, $insertSecondSem);

            if ($newresult) {
                $stmt = "UPDATE student_info SET status='FIRST SEM COMPLETED' WHERE id ='$id' ";
                $result = mysqli_query($con, $stmt);

                if ($result) {
                    $response = [
                        'success' => 'Success'
                    ];
                } else {
                    $response = [
                        'error' => 'Something went wrong'
                    ];
                }
            }
        } else {
            $response = [
                'error' => 'Something went wrong'
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

if (isset($_POST['second'])) {
    $id = $_POST['id'];

    $stmt = "UPDATE second_sem SET student_status = 'PASSED' WHERE student_id = '$id'";
    $result = mysqli_query($con, $stmt);

    if ($result) {
        $stmt = "UPDATE student_info SET status='SUBJECT COMPLETED' WHERE id ='$id' ";
        $result = mysqli_query($con, $stmt);

        if ($result) {
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

if (isset($_POST['dropped'])) {
    $id = $_POST['id'];

    $stmt = "UPDATE second_sem SET student_status = 'DROPPED' WHERE student_id = '$id'";
    $result = mysqli_query($con, $stmt);

    if ($result) {
        $stmt = "UPDATE student_info SET status='DROPPED' WHERE id ='$id' ";
        $result = mysqli_query($con, $stmt);

        if ($result) {
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

if (isset($_POST['droppedf'])) {
    $id = $_POST['id'];

    $stmt = "UPDATE first_sem SET student_status = 'DROPPED' WHERE student_id = '$id'";
    $result = mysqli_query($con, $stmt);

    if ($result) {
        $stmt = "UPDATE student_info SET status='DROPPED' WHERE id ='$id' ";
        $result = mysqli_query($con, $stmt);

        if ($result) {
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

if (isset($_POST['add_course'])) {
    $course = $_POST['course'];

    $sql = mysqli_query($con, "SELECT * FROM course WHERE c_name = '$course'");
    if (mysqli_num_rows($sql) >  0) {
        echo '<script type="text/javascript">';
        echo 'alert("Course exist!");';
        echo 'window.location.href = "dashboard.php";';
        echo '</script>';
        return false;
    } else {
        $sql = mysqli_query($con, "INSERT INTO course (c_name) VALUES ('$course')");
        if ($sql) {
            echo '<script type="text/javascript">';
            echo 'alert("Successfully Added!");';
            echo 'window.location.href = "dashboard.php";';
            echo '</script>';
            return true;
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Error");';
            echo '</script>';
            return false;
        }
    }
}


if(isset($_POST['get-data-first'])){
    
}