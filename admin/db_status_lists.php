<?php
include('../includes/dbconnection.php');


if (isset($_POST['see_dropped'])) {
    $session = $_POST['session'];

    $stmt = "SELECT * FROM first_sem WHERE session='$session' AND student_status='DROPPED'";

    $result = mysqli_query($con, $stmt); ?>

    <table class="table table-striped table-bordered table-hover" id="tableNew">
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Name</th>
                <th>Date Enrolled</th>
                <th>Company</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="overflow: scroll;">
            <?php
            foreach ($result as $res) { ?>
                <tr class="odd gradeX">
                    <td><?php echo htmlentities($res['student_reg_number']); ?></td>
                    <td><?php echo htmlentities(strtoupper($res['student_name'])); ?></td>
                    <td><?php echo htmlentities($res['date_enrolled']); ?></td>
                    <td><?php echo htmlentities(strtoupper($res['company'])); ?></td>
                    <td>
                        <?php echo htmlentities($res['student_status']); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
<?php }

if (isset($_POST['see_passed'])) {

    $session = $_POST['session'];

    $stmt = "SELECT * FROM first_sem WHERE session='$session' AND student_status='PASSED'";

    $result = mysqli_query($con, $stmt); ?>

    <table class="table table-striped table-bordered table-hover" id="tableNew">
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Name</th>
                <th>Date Enrolled</th>
                <th>Company</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="overflow: scroll;">
            <?php
            foreach ($result as $res) { ?>
                <tr class="odd gradeX">
                    <td><?php echo htmlentities($res['student_reg_number']); ?></td>
                    <td><?php echo htmlentities(strtoupper($res['student_name'])); ?></td>
                    <td><?php echo htmlentities($res['date_enrolled']); ?></td>
                    <td><?php echo htmlentities(strtoupper($res['company'])); ?></td>
                    <td>
                        <?php echo htmlentities($res['student_status']); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
<?php } ?>