<?php
include('../includes/dbconnection.php');
$pID = $_POST['pID'];

$stmt = "SELECT comp_tb.comp, comp_tb.id, student_info.session,
    COUNT(student_info.id) AS registration_count
    FROM comp_tb 
    LEFT JOIN student_info ON comp_tb.comp = student_info.comp
    WHERE session = '$pID'
    GROUP BY comp_tb.comp";

$result = mysqli_query($con, $stmt);

if (mysqli_num_rows($result) > 0) { ?>

    <div class="btn-group" role="group" aria-label="Basic outlined example" style="margin-block: 1%; width:auto">
        <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
            <button id="btn-view-data" type="button" class="btn btn-outline-primary btn-view-data" data-session="<?php echo strtoupper($rows['session']) ?>" data-company="<?php echo strtoupper($rows['comp']) ?>"><?php echo strtoupper($rows['comp']) . " " . $rows['registration_count'] ?></button>
        <?php } ?>
    </div>

<?php } else {
    echo 'No cadets found for the selected session.';
}
?>