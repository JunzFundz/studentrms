<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DASHBOARD</title>
        <!-- MetisMenu CSS -->
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->

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

        <form method="post">

            <div id="wrapper">

                <div class="container-div">

                    <div class="navigation">
                        <h4 id="title">Student Records</h4>
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
                                            while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                                <option data-id="<?php echo $row['id'] ?>"><?php echo $row['session'] ?></option>
                                            <?php
                                            }
                                            ?>
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

            <?php 
            include('add-platoon.php');
            include('add-officer.php');
            ?>

            <script>
                $(document).ready(function() {

                    var selectedSession = localStorage.getItem('selectedSession');
                    var storedData = localStorage.getItem('datadistContent');

                    if (selectedSession !== null && storedData !== null) {
                        $('#sessionSelect').val(selectedSession);
                        $('.datadist').html(storedData);
                    }

                    $('#sessionSelect').change(function() {
                        var pID = $('option:selected', this).data('id');

                        localStorage.setItem('selectedSession', pID);

                        $.ajax({
                            url: "get-cadets-data.php",
                            type: "post",
                            data: {
                                'pID': pID
                            },
                            success: function(data) {
                                $('.datadist').html(data);

                                localStorage.setItem('datadistContent', data);
                            }
                        });
                    });
                });
            </script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>

            <!-- Custom Theme JavaScript -->
            <script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
            <script src="admin.js"></script>

        </form>
    </body>

    </html>
<?php } ?>