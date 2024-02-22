<?php
include('../includes/dbconnection.php');

$pID = $_POST['pID'];

$stmt = "SELECT platoons_tb.platoons, COUNT(registration.stud_id) AS registration_count
    FROM platoons_tb 
    LEFT JOIN registration ON platoons_tb.platoons = registration.platoon
    WHERE session_id = '$pID'
    GROUP BY platoons_tb.platoons";

$result = mysqli_query($con, $stmt);

if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) { ?>

        <div class="card border-primary mb-3" style="max-width: 18rem; margin: 10px">
            <div class="card-header"><?php echo strtoupper($rows['platoons']) ?></div>
            <div class="card-body text-primary">
                <h5 class="card-title">Number of cadets</h5>
                <p class="card-text"><?php echo $rows['registration_count'] ?></p>
            </div>
        </div>

<?php }
} else {
    echo 'No cadets found for the selected session.';
}
?>