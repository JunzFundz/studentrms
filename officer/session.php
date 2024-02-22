<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
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


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>session</title>
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- new added libraries -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
        <!-- end of new added -->

    </head>

    <body>

        <div class="container-div">

            <div class="navigation">
                <h4 id="title">Student Records</h4>
            </div>

            <div class="side-panel">
                <?php include('leftbar.php') ?>
            </div>

            <div class="right-panel">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-lg-2">
                                        <label>Session<span id="" style="font-size:11px;color:red">*</span></label>
                                    </div>
                                    <br>
                                    <div class="col-lg-4">
                                        <?php $query = mysqli_query($con, "SELECT * FROM `session` where status=1");
                                        while ($res = mysqli_fetch_array($query)) { ?>
                                            <b>Current Session:</b> <?php echo $res['session'] ?>
                                        <?php } ?><br />
                                        <br />
                                        <form method="post">
                                            <?php $query = mysqli_query($con, "SELECT * FROM `session`");
                                            while ($res = mysqli_fetch_array($query)) { ?>
                                                <input type="radio" name="session" id="session" value="<?php echo $res['session'] ?>" required="required">
                                                &nbsp;&nbsp;<?php echo $res['session'] ?> <br>
                                            <?php  } ?>
                                    </div> <br />
                                    <div class="col-lg-3">&nbsp;</div>
                                    <div class="col-lg-9">
                                        <br>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Update Session">
                                        <a href="enrollees.php">View Enrollees</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#page-wrapper -->
            </div>
        </div>
        </div>

        <?php include('add-platoon.php') ?>


        <!-- jQuery -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
        <script src="admin.js"></script>
    </body>

    </html>
<?php } ?>