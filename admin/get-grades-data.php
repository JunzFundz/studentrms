<?php
include('../includes/dbconnection.php');
$nID = $_POST['nID'];

$stmt = "SELECT comp_tb.comp, comp_tb.id, student_info.session,
    COUNT(student_info.id) AS registration_count
    FROM comp_tb 
    LEFT JOIN student_info ON comp_tb.comp = student_info.comp
    WHERE session = '$nID'
    GROUP BY comp_tb.comp";

$result = mysqli_query($con, $stmt);

if (mysqli_num_rows($result) > 0) { ?>

    <div style="display:flex; flex-direction: column;">

        <div class="btn-group" role="group" aria-label="Basic outlined example" style="margin-block: 1%; width:auto">
            <?php while ($rows = mysqli_fetch_assoc($result)) { ?>

                <button id="btn-in-grade" type="button" class="btn btn-outline-primary btn-in-grade" data-session="<?php echo strtoupper($rows['session']) ?>" data-company="<?php echo strtoupper($rows['comp']) ?>"><?php echo strtoupper($rows['comp']) ?></button>

            <?php } ?>
        </div>

        <div class="select-semester-column" style="width: 20%;">
            <select class="select-semester form-select" aria-label="Default select example">
                <option value="1" selected data-get_sem="1">First sem</option>
                <option value="2" data-get_sem="2">Second sem</option>
            </select>
        </div>

    <?php } else {
    echo 'No cadets found for the selected session.';
}
    ?>