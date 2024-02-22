<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_GET['stud_id'])) {
        $stud_id = $_GET['stud_id'];

        $query = "SELECT * FROM registration WHERE stud_id = '$stud_id'";
        $result = mysqli_query($con, $query);
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> CADETS REGISTRATION</title>
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


        <!-- new added libraries -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
        <!-- end of new added -->

        <script type="text/javascript">
            function showSub(val) {
                // alert(val);
                $.ajax({
                    type: "POST",
                    url: "subject.php",
                    data: 'cid=' + val,
                    success: function(data) {
                        // alert(data);
                        $("#c-full").val(data);
                    }
                });

            }
        </script>

    </head>

    <body>


        <div class="container-div">

            <div class="navigation">
                <h4 id="title">Student Records</h4>
            </div>

            <div class="side-panel">
                <?php include('leftbar.php') ?>
            </div>

            <style>
                label,
                #pl {
                    margin-left: -10px;
                    font-weight: 700;
                    padding-bottom: 10px;
                }

                #pl {
                    margin-left: -10px;
                    font-weight: 700;
                }

                input {
                    padding: 10px;
                    width: 100%;
                    margin: 0;
                }

                .col-data {
                    border: 0.1px solid black;
                    padding: 10px;
                    height: 40px;
                }

                #title-heading {
                    background-color: white !important;
                }

                .col {
                    margin-left: -11px;
                }

                tbody,
                td,
                .tb {
                    border: 1px solid black !important;
                }

                @media print {
                    * {
                        font-family: 'Times New Roman', Times, serif;
                    }

                    .side-panel,
                    .btn-info {
                        display: none;
                    }

                    #title-heading {
                        font-size: 15px;
                    }

                    .right-panel {
                        grid-column: 1/14;
                    }
                }
            </style>

            <div class="right-panel">

                <button type="button" class="btn btn-info" id="info-print">Info</button>

                <br><br><br><br>

                <?php foreach ($result as $row) { ?>

                    <h5 id="title-heading">Personal Informations</h5><br>

                    <div class="container">
                        <div class="col">
                            <h6 id="pl">Platoon : <?php echo $row['platoon'] ?></h6>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label>First Name</label><br>
                                <div class="col col-data">
                                    <?php echo $row['fname'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>Middle Name</label><br>
                                <div class="col col-data">
                                    <?php echo $row['mname'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>Last Name</label><br>
                                <div class="col col-data">
                                    <?php echo $row['lname'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>Gender</label><br>
                                <div class="col col-data">
                                    <?php echo $row['gender'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>Mobile</label><br>
                                <div class="col col-data">
                                    <?php echo $row['mobno'] ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Email</label><br>
                                <div class="col col-data">
                                    <?php echo $row['emailid'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>Nationality</label><br>
                                <div class="col col-data">
                                    <?php echo $row['nationality'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>Occupation</label><br>
                                <div class="col col-data">
                                    <?php echo $row['ocp'] ?>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Province</label><br>
                                <div class="col col-data">
                                    <?php echo $row['pro'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>City</label><br>
                                <div class="col col-data">
                                    <?php echo $row['city'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>Co. Address</label><br>
                                <div class="col col-data">
                                    <?php echo $row['cadd'] ?>
                                </div>
                            </div>
                            <div class="col">
                                <label>Permanent Address</label><br>
                                <div class="col col-data">
                                    <?php echo $row['padd'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        <?php } ?>
        </div>

        </div>

        <!-- jQuery -->
        <script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
        <script src="admin.js"></script>
    </body>

    </html>
<?php } ?>