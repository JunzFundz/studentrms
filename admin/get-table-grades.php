<?php
include('../includes/dbconnection.php');
$session = $_POST['session'];
$company = $_POST['company'];

$stmt_first = "SELECT * FROM first_sem WHERE company = '$company' AND session = '$session'";
$result_first = mysqli_query($con, $stmt_first);

$stmt_second = "SELECT * FROM second_sem WHERE company = '$company' AND session = '$session'";
$result_second = mysqli_query($con, $stmt_second);
?>

<style>
    @media print {

        .navigation,
        .side-panel,
        .btn-group,
        .body--inn,
        .select-semester-column,
        .panel-heading,
        .btn-info {
            display: none;
        }

        .right-panel {
            height: auto;
            grid-column: 1/13;
            background-color: rgba(255, 255, 255, 0);
            box-shadow: 10px 10px 18px -1px rgba(0, 0, 0, 0);
        }

        .secondsem,
        .firstsem {
            background-color: rgba(255, 255, 255, 0);
            -webkit-box-shadow: 1px 2px 24px -4px rgba(0, 0, 0, 0);
            -moz-box-shadow: 1px 2px 24px -4px rgba(0, 0, 0, 0);
            box-shadow: 1px 2px 24px -4px rgba(0, 0, 0, 0);
        }

    }
</style>

<div class="firstsem firstsem--">
    <h5 id="">First semester</h5>
    <br>
    <br>
    <br>
    <table id="tableNew1st" class="table table-bordered" style="border: 2px black; height:fit-content">
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Full name</th>
                <th>Grades</th>
            </tr>
        </thead>
        <tbody class="">
            <?php while ($first = mysqli_fetch_assoc($result_first)) { ?>
                <tr>
                    <td><?= $first['student_reg_number']; ?></td>
                    <td><?= $first['student_name']; ?></td>
                    <td><input type="text" class="add-grade" data-id="<?= $first['student_id']; ?>" style="border: none;" value="<?= strtoupper($first['first_sem_grade']); ?>"></td>
                </tr>
            <?php include 'modal/add-grade.php';
            } ?>
        </tbody>
    </table>
    <button class="btn btn-info" onclick="window.print()">Print</button>
</div>

<div class="secondsem secondsem--">
    <h5>Second semester</h5>
    <br>
    <br>
    <br>
    <table id="tableNew2nd" class="table table-bordered" style="border: 2px black">
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>Full name</th>
                <th>Grades</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($second = mysqli_fetch_assoc($result_second)) { ?>
                <tr>
                    <td><?= $second['student_reg_number']; ?></td>
                    <td><?= $second['student_name']; ?></td>
                    <td><input type="text" class="add-second" data-nid="<?= $second['student_id']; ?>" style="border: none;" value="<?= strtoupper($second['second_sem_grade']); ?>"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button class="btn btn-info" onclick="window.print()">Print</button>
</div>

<script>
    $(document).ready(function() {
        $('.secondsem').hide();
    });
</script>