<?php 

include '../includes/dbconnection.php';

    $grade = $_POST['grade'];
    $student_id = $_POST['student_id'];

    $sql = "UPDATE second_sem SET second_sem_grade = '$grade' WHERE student_id = '$student_id'";
    if (mysqli_query($con, $sql)) {
        echo '<script type="text/javascript">
        ';
        echo 'alert("Grade Successfully Added!");';
        echo 'window.location.href = "dashboard.php";';
        echo '
    </script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }