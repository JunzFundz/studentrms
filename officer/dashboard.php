<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {


?>

    <?php include('header.php'); ?>

    <body>

        <form method="post">

            <div id="wrapper">

                <div class="container-div">

                    <div class="navigation">
                        <?php include('admin-header.php') ?>
                    </div>

                    <div class="side-panel">
                        <?php include('leftbar.php') ?>
                    </div>

                    <div class="right-panel">

                        <div id="data">

                        </div>

                        <div class="row">
                            <div class="">
                                <div class="panel panel-default">
                                    <div class="panel-heading">LISTED CADETS</div><br>
                                    <div class="panel-body">
                                        <h6>Select Year</h6>

                                        <select id="sessionSelect" class="form-select" aria-label="Default select example" style="width: 15%;">
                                            <?php
                                            $query = mysqli_query($con, "SELECT session, id FROM session");
                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                <option data-id="<?php echo $row['id'] ?>"><?php echo $row['session'] ?></option>
                                            <?php } ?>
                                        </select>

                                        <div id="data"></div>

                                        <br><br>
                                        <div class="row datadist">

                                            <div class="col-lg-12" id="item1">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        include('add-platoon.php');
        include('add-officer.php');
        include('footer.php');
        ?>
<?php } ?>