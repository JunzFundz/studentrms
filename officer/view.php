<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['del'])) {
        $sid = $_GET['del'];
        $query = mysqli_query($con, "DELETE FROM student_info WHERE id='$sid'");
        echo '<script>alert("Student record  deleted")</script>';
        echo "<script>window.location.href='view.php'</script>";
    }
?>

<title>View</title>

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
                                    <table class="table table-striped table-bordered table-hover text-center" id="tableNew">

                                        <thead>
                                            <tr>
                                                <th>Reg No.</th>
                                                <th>Session</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Company</th>
                                                <th>More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT * FROM student_info");
                                            $sn = 1;
                                            while ($res = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $sn ?></td>
                                                    <td><?php echo htmlentities($res['session']); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['fname'] . " " . $res['mi'] . ". " . $res['lname'])); ?></td>
                                                    <td><?php echo htmlentities($res['phone']); ?></td>
                                                    <td><?php echo htmlentities(strtoupper($res['comp'])); ?></td>
                                                    <td width="100">

                                                        <a href="view-student.php?id=<?php echo htmlentities($res['id']); ?>" class="btn btn-secondary btn-xs"><i class="bi bi-eye"></i></a> &nbsp;&nbsp;

                                                        <a href="print.php?id=<?php echo htmlentities($res['id']); ?>" class="btn btn-success btn-xs"><i class="bi bi-printer"></i></a> &nbsp;&nbsp;

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
    include('load-modals.php');
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