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
    <?php include('header.php') ?>

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
                <?php include('admin-header.php') ?>
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
                    .side-panel,
                    .btn {
                        display: none;
                    }

                    #title-heading {
                        font-size: 15px;
                    }

                    .navigation {
                        box-shadow: none;
                    }

                    .right-panel {
                        grid-column: 1/14;
                        box-shadow: none;
                    }
                }
            </style>

            <div class="right-panel">

                <button type="button" class="btn btn-primary" id="info-print">Print Info</button>

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
                    <br><br><br><br>
            </div>

        <?php } ?>
        </div>

        </div>
        <?php
        include('add-platoon.php');
        include('add-officer.php');
        include('footer.php');
        ?>
    <?php } ?>