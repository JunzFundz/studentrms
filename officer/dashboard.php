<?php
session_start();
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
	header('location: ../logout.php');
} else {
?>

<title>Dashboard</title>

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

                                        <div class="row row-cols-2 row-cols-lg-5 g-2">
                                            <div class="col">
                                                <div class="p-3">
                                                    <label>Yr. Session<span id="" style="font-size:11px;color:red">*</span></label>
                                                    <select id="sessionSelect" class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Select</option>
                                                        <?php
                                                        $query = mysqli_query($con, "SELECT session, sid FROM session");
                                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                                            <option data-id="<?php echo $row['session'] ?>">Yr. <?php echo $row['session'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row datadist"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="table-data"></div>

                </div>
            </div>
        </form>
        <?php
        include('load-modals.php');
        include('footer.php');
        ?>
    <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>