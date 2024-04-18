<?php
include ('../includes/dbconnection.php');
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
    <?php
    $sql_dropped = mysqli_query($con, "SELECT session, COUNT(student_status) AS dropped FROM first_sem WHERE student_status='DROPPED' AND session = '$session'");
    $row_dropped = mysqli_fetch_assoc($sql_dropped);

    $sql_passed = mysqli_query($con, "SELECT session, COUNT(student_status) AS passed FROM first_sem WHERE student_status='PASSED' AND session = '$session'");
    $row_passed = mysqli_fetch_assoc($sql_passed);
    ?>
    <a style="color:red" href="#" id="dropped" data-session="<?php echo $row_dropped['session']; ?>"
        data-sem="first">Dropped : <?php echo $row_dropped['dropped']; ?></a>
    <br>
    <a style="color:green" href="#" id="passed" data-session="<?php echo $row_passed['session']; ?>"
        data-sem="first">Passed : <?php echo $row_passed['passed']; ?></a>

    <br>
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
                    <td><?= $first['date_enrolled'] ?></td>
                    <td><?= $first['date_completed'] ?></td>
                    <td><?= $first['student_status']; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">More</button>
                            <ul class="dropdown-menu">
                                <?php
                                if ($first['student_status'] == 'PASSED' || $first['student_status'] == 'DROPPED') { ?>
                                    <li>
                                        <button disabled class="dropdown-item drop-studentf"
                                            data-id="<?= $first['student_id']; ?>" href="#">Drop</button>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a class="dropdown-item drop-studentf" data-id="<?= $first['student_id']; ?>"
                                            href="#">Drop</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php include 'modal/add-grade.php';
            } ?>
        </tbody>
    </table>
</div>

<div class="secondsem">
    <h5 id="title-heading">Second semester</h5>
    <br>
    <?php
    // Fetch dropped students count from second_sem
    $sql_dropped = mysqli_query($con, "SELECT session, COUNT(student_status) AS dropped FROM second_sem WHERE student_status='DROPPED' AND session = '$session'");
    $row_dropped = mysqli_fetch_assoc($sql_dropped);

    // Fetch passed students count from second_sem
    $sql_passed = mysqli_query($con, "SELECT session, COUNT(student_status) AS passed FROM second_sem WHERE student_status='PASSED' AND session = '$session'");
    $row_passed = mysqli_fetch_assoc($sql_passed);
    ?>
    <a style="color:red" href="#" id="dropped" data-session="<?php echo $row_dropped['session']; ?>"
        data-sem="second">Dropped : <?php echo $row_dropped['dropped']; ?></a>
    <br>
    <a style="color:green" href="#" id="passed" data-session="<?php echo $row_passed['session']; ?>"
        data-sem="second">Passed : <?php echo $row_passed['passed']; ?></a>

    <br>
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
                    <td><?= $second['date_enrolled'] ?></td>
                    <td><?= $second['date_completed'] ?></td>
                    <td><?= $second['student_status']; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">More</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item drop-student" href="#"
                                        data-id="<?= $second['student_id']; ?>">Drop</a></li>

                                <?php
                                if ($second['student_status'] == 'DROPPED' || $second['student_status'] == 'PASSED') { ?>
                                    <li>
                                        <button disabled class="dropdown-item passed" data-id="<?= $second['student_id']; ?>"
                                            href="#">Passed</button>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a class="dropdown-item passed" data-id="<?= $second['student_id']; ?>"
                                            href="#">Passed</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        new DataTable('#tableNew1st');
        new DataTable('#tableNew2nd');
    });
</script>