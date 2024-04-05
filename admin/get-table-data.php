<?php
include('../includes/dbconnection.php');
$session = $_POST['session'];
$company = $_POST['company'];

// Fetch data from the first semester table
$stmt_first = "SELECT * FROM first_sem WHERE company = '$company' AND session = '$session'";
$result_first = mysqli_query($con, $stmt_first);

// Fetch data from the second semester table
$stmt_second = "SELECT * FROM second_sem WHERE company = '$company' AND session = '$session'";
$result_second = mysqli_query($con, $stmt_second);
?>

<div class="firstsem">
    <h5 id="title-heading">First semester</h5>
    <br>
    <table id="tableNew1st" class="table table-hover table-borderless">
        <thead>
            <tr>
                <th>Session</th>
                <th>Company</th>
                <th>Full name</th>
                <th>Date Enrolled</th>
                <th>Date Completed</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php while ($first = mysqli_fetch_assoc($result_first)) { ?>
                <tr>
                    <td><?= $first['session']; ?></td>
                    <td><?= $first['company']; ?></td>
                    <td><?= strtoupper($first['student_name']); ?></td>
                    <td><?= date('d-m-y', strtotime($first['date_enrolled'])) ?></td>
                    <td><?= date('d-m-y', strtotime($first['date_completed'])) ?></td>
                    <td><?= $first['student_status']; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More</button>
                            <ul class="dropdown-menu">
                                <li><a 
                                data-id="<?= $first['student_id']; ?>"
                                class="dropdown-item drop-studentf" href="#">Drop</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="secondsem">
    <h5 id="title-heading">Second semester</h5>
    <br>
    <table id="tableNew2nd" class="table table-hover table-borderless">
        <thead>
            <tr>
                <th>Session</th>
                <th>Company</th>
                <th>Full name</th>
                <th>Date Enrolled</th>
                <th>Date Completed</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php while ($second = mysqli_fetch_assoc($result_second)) { ?>
                <tr>
                    <td><?= $second['session']; ?></td>
                    <td><?= $second['company']; ?></td>
                    <td><?= strtoupper($second['student_name']); ?></td>
                    <td><?= date('d-m-y', strtotime($second['date_enrolled'])) ?></td>
                    <td><?= date('d-m-y', strtotime($second['date_completed'])) ?></td>
                    <td><?= $second['student_status']; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item drop-student" href="#"
                                data-id="<?= $second['student_id']; ?>"
                                >Drop</a></li>
                                <li><a class="dropdown-item student-passed"
                                data-id="<?= $second['student_id']; ?>"
                                href="#">Passed</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        new DataTable('#tableNew1st');
        new DataTable('#tableNew2nd');
    });
</script>