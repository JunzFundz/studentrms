
<?php


include('../includes/dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $comp = $_POST['comp'];
    $sessionid = $_POST['sessionid'];
    $session = $_POST['session'];
    $course = $_POST['course'];
    $major = $_POST['major'];
    $semester = $_POST['semester'];
    $fname = $_POST['fname'];
    $mi = $_POST['mi'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $pbirth = $_POST['pbirth'];
    $dob = $_POST['dob'];
    $btype = $_POST['btype'];
    $religion = $_POST['religion'];
    $region = $_POST['region'];
    $civil = $_POST['civil'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $father = $_POST['father'];
    $f_occupation = $_POST['f_occupation'];
    $mother = $_POST['mother'];
    $m_occupation = $_POST['m_occupation'];
    $rotc_grade = $_POST['rotc_grade'];
    $person_name = $_POST['person_name'];
    $person_relationship = $_POST['person_relationship'];
    $person_add = $_POST['person_add'];
    $person_phone = $_POST['person_phone'];
    $regno = rand(10000000, 99999999);
    $status = 'ENROLLED';

    $sql = "INSERT INTO student_info (comp, sessionid, session, course, major, semester, fname, mi, lname, gender, pbirth, dob, btype, religion, region, civil, phone, address, father, f_occupation, mother, m_occupation, rotc_grade, person_name, person_relationship, person_add, person_phone, date_enrolled, reg_no, status) VALUES ('$comp', '$sessionid', '$session', '$course', '$major', '$semester', '$fname', '$mi', '$lname', '$gender', '$pbirth', '$dob', '$btype', '$religion', '$region', '$civil', '$phone', '$address', '$father', '$f_occupation', '$mother', '$m_occupation', '$rotc_grade', '$person_name', '$person_relationship', '$person_add', '$person_phone' , NOW(), '$regno', '$status')";

    if (mysqli_query($con, $sql)) {

        $id = mysqli_insert_id($con);

        $inserttoSem = "INSERT INTO first_sem (session, company, student_id, student_reg_number, student_name, date_enrolled, student_status) VALUES('$session', '$comp', '$id', '$regno', '$fname $mi $lname', NOW(), '$status')";

        if(mysqli_query($con, $inserttoSem)){
            echo '<script type="text/javascript">';
            echo 'alert("Successfully registered");';
            echo 'window.location.href = "add.php" ';
            echo '</script>';
        }
    } else {
        echo "Error inserting records: " . mysqli_error($con);
    }
}

?>
