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
                        <div class="panel panel-default">

                            <!-- /.panel-heading -->
                            <form method="post">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-lg-2">
                                    <?php
                                        $query = mysqli_query($con, "SELECT * FROM `session` WHERE status =1");
                                        while ($res = mysqli_fetch_array($query)) { ?>

                                        <h6>Current Session : <span id="" style="font-size:12px;color:red; font-weight:700"><?php echo $res['session'] ?></span></label>

                                        <?php  } ?>
                                    </div><br>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#add-session">Add session</a> 
                                    >
                                    <a href="enrollees.php">View Enrollees</a>
                                    <br><br>

                                    <div class="col-lg-4">
                                        <?php
                                        $query = mysqli_query($con, "SELECT * FROM `session`");
                                        while ($res = mysqli_fetch_array($query)) { ?>
                                            <input type="radio" 
                                            name="session" 
                                            id="session" 
                                            value="<?php echo $res['session'] ?>" required="required">
                                            &nbsp;&nbsp;<?php echo $res['session'] ?>

                                            <a href="#" 
                                            data-session_id="<?php echo $res['id'] ?>" class="edit-session" data-bs-toggle="modal" data-bs-target="#modal-session" style="margin-left:5px">edit</a>

                                            <br>
                                        <?php  } ?>

                                    </div>
                                    <br />
                                    <div class="col-lg-3">&nbsp;</div>
                                    <div class="col-lg-9">
                                        <br>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Update Session">
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

        <?php
        include('add-platoon.php');
        include('add-officer.php');
        include('modal/change-session.php');
        include('modal/add-session.php');
        include('footer.php');
        ?>

        <script src="admin.js"></script>
    </body>

    </html>
<?php } ?>