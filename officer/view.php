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
        echo "<script>window.location.href='view.php'</script>";
    }

?>


    <?php include('header.php') ?>

    <div id="wrapper">

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
                        <h4 class=""> <?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4><br>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                View Students
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">

                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="tableNew">

                                        <thead>
                                            <tr>
                                                <th>Id number</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Platoon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $query = mysqli_query($con, "select * from registration");
                                            $sn = 1;
                                            while ($res = mysqli_fetch_array($query)) {

                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $sn ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['fname'] . " " . $res['mname'] . " " . $res['lname'])); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['emailid'])); ?></td>
                                                    <td><?php echo htmlentities($res['mobno']); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['platoon'])); ?></td>
                                                    <td width="100"><a href="edit-student.php?stud_id=<?php echo htmlentities($res['stud_id']); ?>" class="btn btn-primary btn-xs">View</a>

                                                    </td>

                                                </tr>

                                            <?php $sn++;
                                            } ?>
                                        </tbody>

                                    </table>
                                </div>
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
            new DataTable('#tableNew');
        })
    </script>
    </body>

    </html>
<?php } ?>