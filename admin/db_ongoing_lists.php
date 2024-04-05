<?php
include('../includes/dbconnection.php');

$session_id = $_POST['session_id'];
$comp = $_POST['comp'];

$stmt = "SELECT * FROM registration WHERE session_id='$session_id' AND status='ongoing' AND comp='$comp'";

$result = mysqli_query($con, $stmt); ?>

<table class="table table-striped table-bordered table-hover" id="tableNew">
    <thead>
        <tr>
            <th>Registration Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($result as $res) { ?>
            <tr class="odd gradeX">
                <td><?php echo htmlentities($res['regno']); ?></td>
                <td><?php echo htmlentities(strtoupper($res['fname'] . " " . $res['mname'] . " " . $res['lname'])); ?></td>
                <td><?php echo htmlentities(strtoupper($res['emailid'])); ?></td>
                <td><?php echo htmlentities($res['mobno']); ?></td>
                <td><?php echo htmlentities(strtoupper($res['comp'])); ?></td>
                <td width="100">
                <?php echo htmlentities($res['status']); ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>