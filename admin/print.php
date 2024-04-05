<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
	header('location: ../logout.php');
} else {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM student_info WHERE id = '$id'";
        $result = mysqli_query($con, $query);
    }

?>
<title>Print</title>
    <?php include('header.php') ?>

    <script type="text/javascript">
        function showSub(val) {
            $.ajax({
                type: "POST",
                url: "subject.php",
                data: 'cid=' + val,
                success: function(data) {
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
                    font-weight: 700;
                    padding-bottom: 10px;
                }

                #pl {
                    margin-left: -10px;
                    font-weight: 700;
                }

                input {
                    color: black !important;
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

                    input,
                    select {
                        border-radius: 0 !important;
                        border: 1px solid black !important;
                    }

                    label {
                        font-size: 11px !important;
                    }

                    #title-heading,
                    .right-panel {
                        font-size: 12px;
                    }

                    .navigation {
                        box-shadow: none;
                    }

                    .right-panel {
                        grid-column: 1/14;
                        box-shadow: none;
                    }

                    .line-divider {
                        display: none;
                    }
                }
            </style>

            <div class="right-panel">
                <button type="button" class="btn btn-primary" id="info-print" style="margin-bottom: 20px;">Print Info</button>
                <?php foreach ($result as $row) { ?>
                    <h5 id="title-heading">PERSONAL INFORMATION</h5>
                    <div class="line-divider" style="height: 2px; width:100%; background-color:grey; margin-block:30px"></div>

                    <div class="container text-left" style="padding: 0; margin-bottom: 10px">
                        <div class="row g-3">
                            <div class="col-sm-3">
                                <label>Company: </label>
                                <?php echo $row['comp'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="container text-left" style="padding: 0;">
                        <div class="row g-3">
                            <div class="col-sm-3">
                                <label>First Name</label>
                                <input disabled class="form-control" value="<?php echo $row['fname'] ?>" name="fname" required="required">
                            </div>

                            <div class="col-sm-3">
                                <label>(MI)</label></label>
                                <input disabled class="form-control" value="<?php echo $row['mi'] ?>" name="mi">
                            </div>

                            <div class="col-sm-3">
                                <label>Last Name</label>
                                <input disabled class="form-control" value="<?php echo $row['lname'] ?>" name="lname">
                            </div>

                            <div class="col-sm-3">
                                <label>Gender</label>
                                <input disabled class="form-control" value="<?php echo $row['gender'] ?>" name="pbirth" required="required">
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label>Place of birth</label>
                                <input disabled class="form-control" value="<?php echo $row['pbirth'] ?>" name="pbirth" required="required">
                            </div>

                            <div class="col-sm-3">
                                <label>Date of Birth</label></label>
                                <input disabled class="form-control" value="<?php echo $row['dob'] ?>" name="dob" type="date">
                            </div>

                            <div class="col-sm-3">
                                <label>Blood type</label>
                                <input disabled class="form-control" value="<?php echo $row['btype'] ?>" name="btype">
                            </div>

                            <div class="col-sm-3">
                                <label>Religion</label>
                                <input disabled class="form-control" value="<?php echo $row['religion'] ?>" name="religion" required="required">
                            </div>

                            <div class="col-sm-3">
                                <label>Region</label></label>
                                <input disabled class="form-control" value="<?php echo $row['region'] ?>" name="region">
                            </div>

                            <div class="col-sm-3">
                                <label>Civil Status</label>
                                <input disabled class="form-control" value="<?php echo $row['civil'] ?>" name="civil">
                            </div>

                            <div class="col-sm-3">
                                <label>Phone</label>
                                <input disabled class="form-control" value="<?php echo $row['phone'] ?>" name="phone">
                            </div>

                            <div class="col-sm-6">
                                <label>Permanet Address</label>
                                <input disabled class="form-control" value="<?php echo $row['address'] ?>" name="address">
                            </div>

                            <div class="col-sm-3">
                                <label>Father's Name</label>
                                <input disabled class="form-control" value="<?php echo $row['father'] ?>" name="father">
                            </div>

                            <div class="col-sm-3">
                                <label>Occupation</label>
                                <input disabled class="form-control" value="<?php echo $row['f_occupation'] ?>" name="f_occupation">
                            </div>

                            <div class="col-sm-3">
                                <label>Mother's Name</label>
                                <input disabled class="form-control" value="<?php echo $row['mother'] ?>" name="mother">
                            </div>

                            <div class="col-sm-3">
                                <label>Occupation</label>
                                <input disabled class="form-control" value="<?php echo $row['m_occupation'] ?>" name="m_occupation">
                            </div>

                            <div class="col-sm-3">
                                <label>ROTC Grade</label>
                                <input disabled class="form-control" value="<?php echo $row['rotc_grade'] ?>" name="rotc_grade">
                            </div>

                        </div>
                    </div>

                    <br>
                    <br>
                    <h5 id="title-heading">PERSON TO BE NOTIFIED IN CASE OF EMERGENCY</h5>
                    <div class="line-divider" style="height: 2px; width:100%; background-color:grey; margin-block:30px"></div>

                    <div class="container text-left" style="padding: 0;">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <label>Name</label>
                                <input disabled class="form-control" value="<?php echo $row['person_name'] ?>" name="person_name">
                            </div>

                            <div class="col-sm-4">
                                <label>Relationship</label>
                                <input disabled class="form-control" value="<?php echo $row['person_relationship'] ?>" name="person_relationship">
                            </div>

                            <div class="col-sm-4">
                                <label>Address</label>
                                <input disabled class="form-control" value="<?php echo $row['person_add'] ?>" name="person_add">
                            </div>

                            <div class="col-sm-4">
                                <label>Phone</label>
                                <input disabled class="form-control" value="<?php echo $row['person_phone'] ?>" name="person_phone">
                            </div>

                        </div>
                    </div>

                <?php } ?>
            </div>

        </div>
        <?php
        include('load-modals.php');
        include('footer.php');
        ?>
    <?php } ?>