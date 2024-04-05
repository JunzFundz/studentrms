<?php
include('../includes/dbconnection.php');

if (isset($_POST['submit'])) {

    $id         = isset($_POST['id']) ? $_POST['id'] : '';
    $comp       = isset($_POST['comp']) ? $_POST['comp'] : '';
    $sem        = isset($_POST['semester']) ? $_POST['semester'] : '';
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

            if ($result && mysqli_num_rows($result) > 0) {
                echo '<script type="text/javascript">';
                echo 'alert("Student Already enrolled in 2nd Semester");';
                echo 'window.location.href = "view.php" ';
                echo '</script>';
            } else {
                $select = "SELECT reg_no, session, comp FROM student_info WHERE id='$id'";
                $result = mysqli_query($con, $select);

                $row = mysqli_fetch_assoc($result);
                $regno = $row['reg_no'];
                $session = $row['session'];
                $company = $row['comp'];

                $insertSecondSem = "INSERT INTO second_sem (session, company, student_id, student_reg_number, student_name, date_enrolled, date_completed, student_status) VALUES ('$session', '$company', '$id', '$regno', '$fname $mi $lname', NOW(), NOW(), 'ONGOING')";

                if (mysqli_query($con, $insertSecondSem)) {

                    $updateFirstSem = "UPDATE first_sem SET date_completed = NOW(), student_status = 'COMPLETED' WHERE student_id = '$id'";
                    if (mysqli_query($con, $updateFirstSem)) {

                        $stmt = "UPDATE student_info SET semester= '2nd' WHERE id = '$id'";
                        if(mysqli_query($con, $stmt)){
                            echo '<script type="text/javascript">';
                            echo 'alert("Successfully updated");';
                            echo 'window.location.href = "view.php" ';
                            echo '</script>';
                        }

                    } else {
                        echo "Error updating first_sem: " . mysqli_error($con);
                    }
                } else {
                    echo "Error inserting records into second_sem: " . mysqli_error($con);
                }
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Successfully updated");';
            echo 'window.location.href = "view.php" ';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error updating records: ' . mysqli_error($con) . '");';
        echo 'window.location.href = "edit-student.php" ';
        echo '</script>';
    }
}
