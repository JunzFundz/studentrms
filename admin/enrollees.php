<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['del'])) {
        $sid = $_GET['del'];
        $query = mysqli_query($con, "delete from registration where stud_id='$sid'");
        echo '<script>alert("Student record  deleted")</script>';
        echo "<script>window.location.href='enrollees.php'</script>";
    }
    if (isset($_POST['submit'])) {
        $status = 1;
        $session = $_POST['session'];

        $sql = "update session set status='$status' where session='$session';";
        $sql .= "update session set status='0' where session!='$session';";
        $query = mysqli_multi_query($con, $sql);
        if ($query) {
            echo '<script>alert("session updated successfully")</script>';
            echo "<script>window.location.href='session.php'</script>";
        }
    } ?>


<?php include('header.php') ?>
        <div class="container-div">

            <div class="navigation">
                <?php include('admin-header.php') ?>
            </div>

            <div class="side-panel">
                <?php include('leftbar.php') ?>
            </div>

            <div class="right-panel">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Enrollees</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>Sessions:&nbsp;&nbsp;</b>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">

                                    <table class="table table-striped table-bordered table-hover" id="tableNew">
                                        <thead>
                                            <tr>
                                                <th>Regestration No.</th>
                                                <th>Name</th>
                                                <th>Session</th>
                                                <th>Phone</th>
                                                <th>Platoon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $query = mysqli_query($con, "SELECT * FROM registration INNER JOIN session ON registration.session_id = session.id ORDER BY platoon");
                                            while ($res = mysqli_fetch_array($query)) {

                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo htmlentities(strtoupper($res['regno'])); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['fname'] . " " . $res['mname'] . " " . $res['lname'])); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['session'])); ?></td>
                                                    <td><?php echo htmlentities($res['mobno']); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['platoon'])); ?></td>

                                                    <td width="100">

                                                        <a href="print.php?stud_id=<?php echo htmlentities($res['stud_id']); ?>" class="btn btn-primary btn-xs">Print</a> &nbsp;&nbsp;

                                                        <a href="enrollees.php?del=<?php echo htmlentities($res['stud_id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Do you really want to delete?');">Delete</a>

                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        include('add-platoon.php');
        include('add-officer.php');
        include('footer.php');
        ?>

        <script>
            $(document).ready(function() {
                $('#tableNew').DataTable({
                    responsive: true
                });
            });
        </script>
    </body>

    </html>
<?php } ?>