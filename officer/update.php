<?php
include('../includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $platoon = isset($_POST['platoon']) ? $_POST['platoon'] : '';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $mname = isset($_POST['mname']) ? $_POST['mname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $gname = isset($_POST['gname']) ? $_POST['gname'] : '';
    $ocp = isset($_POST['ocp']) ? $_POST['ocp'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $nation = isset($_POST['nation']) ? $_POST['nation'] : '';
    $mobno = isset($_POST['mobno']) ? $_POST['mobno'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pro = isset($_POST['pro']) ? $_POST['pro'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $paddress = isset($_POST['padd']) ? $_POST['padd'] : '';
    $caddress = isset($_POST['cadd']) ? $_POST['cadd'] : '';

    $stmt = "UPDATE registration 
    SET platoon = '$platoon', 
    fname = '$fname', 
    mname = '$mname', 
    lname = '$lname', 
    gender = '$gender', 
    gname = '$gname', 
    ocp = '$ocp', 
    nationality = '$nation', 
    mobno = '$mobno', 
    emailid = '$email', 
    pro = '$pro', 
    city = '$city', 
    padd = '$paddress', 
    cadd = '$caddress' 
    WHERE id = '$id'";

    $result = mysqli_query($con, $stmt);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Successfully updated");';
        echo 'window.location.href = "view.php" ';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error");';
        echo 'window.location.href = "edit-student.php" ';
        echo '</script>';
    }
}
?>
