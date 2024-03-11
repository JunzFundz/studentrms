<?php
include('../includes/dbconnection.php');

$pID = $_POST['pID'];

$stmt = "SELECT platoons_tb.platoons, platoons_tb.id, registration.session_id,
    COUNT(registration.stud_id) AS registration_count
    FROM platoons_tb 
    LEFT JOIN registration ON platoons_tb.platoons = registration.platoon
    WHERE session_id = '$pID'
    GROUP BY platoons_tb.platoons";

$result = mysqli_query($con, $stmt);

if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) { ?>

        <div class="card border-primary mb-3" style="max-width: 18rem; margin: 10px">
            <a href="view-all.php?platoons=<?php echo $rows['platoons']; ?>&session_id=<?php echo $rows['session_id']; ?>" 
            style="cursor: pointer;">
                <div class="card-header"><?php echo strtoupper($rows['platoons']) ?></div>
                <div class="card-body text-primary">
                    <h5 class="card-title">Number of cadets</h5>
                    <p class="card-text"><?php echo $rows['registration_count'] ?></p>
                </div>
            </a>
        </div>

<?php }
} else {
    echo 'No cadets found for the selected session.';
}
?>