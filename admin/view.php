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
        echo "<script>window.location.href='views.php'</script>";
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Manage Students</title>
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- new added libraries -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">

        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
        <!-- end of new added -->





    </head>

    <body>

        <div id="wrapper">

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
                                                    <th>MobnO</th>
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
                                                        <td width="100"><a href="edit-student.php?stud_id=<?php echo htmlentities($res['stud_id']); ?>" class="btn btn-primary btn-xs">Edit</a> &nbsp;&nbsp;
                                                            <a href="views.php?del=<?php echo htmlentities($res['stud_id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Do you really want to delete?');">Delete</a>

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
            ?>
        <!-- new libraries -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>
        <script src="admin.js"></script>

        <script>
            $(document).ready(function() {
                new DataTable('#tableNew');
            })
        </script>
    </body>

    </html>
<?php } ?>