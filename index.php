<?php 
header('location:login.php');

$con=mysqli_connect("localhost","root","","freya");


$id = mysqli_real_escape_string($con, $_GET['q']);

$sql="SELECT * FROM index_emp WHERE id = '$id'";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
    foreach($result as $row){
        echo "<h1>" . $row['lname'] . ", " . $row['fname'] . ", " . $row['mname'] . "</h1>";
    }
}else{
    echo "No records found";
}

mysqli_close($con);
?>
