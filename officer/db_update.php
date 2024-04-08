<?php
include('../includes/dbconnection.php');

if (isset($_POST['submit'])) {

    $id         = isset($_POST['id']) ? $_POST['id'] : '';
    $comp       = isset($_POST['comp']) ? $_POST['comp'] : '';
    $sem        = isset($_POST['semester']) ? $_POST['semester'] : '';
    $course        = isset($_POST['course']) ? $_POST['course'] : '';
    $major        = isset($_POST['major']) ? $_POST['major'] : '';
    $fname      = isset($_POST['fname']) ? $_POST['fname'] : '';
    $mi         = isset($_POST['mi']) ? $_POST['mi'] : '';
    $lname      = isset($_POST['lname']) ? $_POST['lname'] : '';
    $gender     = isset($_POST['gender']) ? $_POST['gender'] : '';
    $pbirth     = isset($_POST['pbirth']) ? $_POST['pbirth'] : '';
    $dob        = isset($_POST['dob']) ? $_POST['dob'] : '';
    $btype      = isset($_POST['btype']) ? $_POST['btype'] : '';
    $religion   = isset($_POST['religion']) ? $_POST['religion'] : '';
    $region     = isset($_POST['region']) ? $_POST['region'] : '';
    $civil      = isset($_POST['civil']) ? $_POST['civil'] : '';
    $phone      = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address    = isset($_POST['address']) ? $_POST['address'] : '';
    $father     = isset($_POST['father']) ? $_POST['father'] : '';
    $f_occupation = isset($_POST['f_occupation']) ? $_POST['f_occupation'] : '';
    $mother     = isset($_POST['mother']) ? $_POST['mother'] : '';
    $m_occupation = isset($_POST['m_occupation']) ? $_POST['m_occupation'] : '';
    $rotc_grade = isset($_POST['rotc_grade']) ? $_POST['rotc_grade'] : '';
    $person_name = isset($_POST['person_name']) ? $_POST['person_name'] : '';
    $person_relationship = isset($_POST['person_relationship']) ? $_POST['person_relationship'] : '';
    $person_add = isset($_POST['person_add']) ? $_POST['person_add'] : '';
    $person_phone = isset($_POST['person_phone']) ? $_POST['person_phone'] : '';

    $stmt = "UPDATE student_info 
    SET comp = '$comp',     
    course = '$course',
    major = '$major',
    semester = '$sem',
    fname = '$fname', 
    mi = '$mi', 
    lname = '$lname', 
    gender = '$gender', 
    pbirth = '$pbirth', 
    dob = '$dob', 
    btype = '$btype', 
    religion = '$religion', 
    region = '$region', 
    civil = '$civil', 
    phone = '$phone', 
    address = '$address', 
    father = '$father', 
    f_occupation = '$f_occupation', 
    mother = '$mother', 
    m_occupation = '$m_occupation', 
    rotc_grade = '$rotc_grade', 
    person_name = '$person_name', 
    person_relationship = '$person_relationship', 
    person_add = '$person_add', 
    person_phone = '$person_phone' 
    WHERE id = '$id'";

    if (mysqli_query($con, $stmt)) {

        if ($sem === '2nd') {
            $check = "SELECT * FROM second_sem WHERE student_id='$id'";
            $result = mysqli_query($con, $check);
            if (mysqli_num_rows($result) > 0) {
                $errorMessage = "Student already enrolled in $sem semester";
            } else {
                $stmt = "UPDATE first_sem SET student_name = '$fname $mi $lname', company = '$comp', date_completed = NOW(), student_status = 'PASSED' WHERE student_id = '$id'";

                if (mysqli_query($con, $stmt)) {
                    $select = "SELECT * FROM student_info WHERE id='$id'";
                    $result = mysqli_query($con, $select);
                    $row = mysqli_fetch_assoc($result);

                    $regno = $row['reg_no'];
                    $session = $row['session'];
                    $company = $row['comp'];
                    $full_name = $row['fname'] . " " . $row['mi'] . ". " . $row['lname'];
                    $insertSecondSem = "INSERT INTO second_sem (session, company, student_id, student_reg_number, student_name, date_enrolled, student_status) VALUES ('$session', '$company', '$id', '$regno', '$full_name', NOW(), 'ONGOING')";
                    $newresult = mysqli_query($con, $insertSecondSem);
                    $successMessage = "Successfully enrolled in 2nd semester";
                }
            }
        } else {
            $stmt = "UPDATE first_sem SET student_name = '$fname $mi $lname', company = '$comp' WHERE student_id = '$id'";

            if (mysqli_query($con, $stmt)) {
                $check = "SELECT * FROM second_sem WHERE id='$id'";
                $result = mysqli_query($con, $check);

                if ($result && mysqli_num_rows($result) > 0) {
                    $stmt = "UPDATE second_sem SET student_name = '$fname $mi $lname', company = '$comp' WHERE id = '$id'";
                    if (mysqli_query($con, $stmt)) {
                        $successMessage = "Successfully updated";
                    }
                } else {
                    $errorMessage = "Error updating second sem records: " . mysqli_error($con);
                }
                $successMessage = "Successfully updated";
            } else {
                $errorMessage = "Error updating first sem records: " . mysqli_error($con);
            }
        }
    } else {
        $errorMessage = "Error updating records: " . mysqli_error($con);
    }



    if (isset($successMessage)) {
        echo '<script type="text/javascript">';
        echo 'alert("' . $successMessage . '");';
        echo 'window.location.href = "view.php";';
        echo '</script>';
    } elseif (isset($errorMessage)) {
        echo '<script type="text/javascript">';
        echo 'alert("' . $errorMessage . '");';
        echo 'window.location.href = "view.php";';
        echo '</script>';
    }
}
