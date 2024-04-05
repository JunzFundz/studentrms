<?php

include('../includes/dbconnection.php');
include('header.php');

if (isset($_GET['comp']) && isset($_GET['sessionid'])) {

    $comp = $_GET['comp'];
    $session_id = $_GET['sessionid'];

    $stmt = "SELECT * FROM student_info
    LEFT JOIN comp_tb
    ON student_info.comp=comp_tb.comp
    WHERE student_info.sessionid='$session_id' AND comp_tb.comp='$comp' ORDER BY status DESC";
?>
<title>View All Students</title>

    <style>
        .btn{
            margin-top: 60px;
            margin-left: 40px;
            position: absolute;
        }
        img {
            margin: 0% 30%;
            width: 40%;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 4% 20%;
        }

        h6 {
            margin-left: 20%;
        }


        @media print {
            .btn {
                display: none;
            }

            img {
                margin: 5% 20%;
                width: 60%;
            }

            section {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 4% 7%;
            }

            table {
                border: 1px solid black;
            }

            h6 {
                font-weight: 700;
                margin-left: 5%;
            }
        }
    </style>

    <button id="print-all" class="btn btn-primary">Print</button>

    <center><img src="../header.png" alt=""></center>

    <?php if ($result = mysqli_query($con, $stmt)) {
    ?>
        <h6>Company: <?php echo $comp ?></h6>
        <section>
            <table class="table table-bordered border-dark">
                <thead>
                    <tr>
                        <th scope="col">REG NO.</th>
                        <th scope="col">NAME</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo $row['reg_no'] ?></td>
                            <td><?php echo $row['fname'] . " " . $row['mi'] . " " . $row['lname'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                        </tr>
                <?php
                    }
                } ?>
                </tbody>
            </table>
        </section>

        <script>
            $(document).ready(function() {
                $("#print-all").on("click", function() {
                    window.print();
                });
            })
        </script>

    <?php
}
    ?>