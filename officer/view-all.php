<?php

include('../includes/dbconnection.php');
include('header.php');

if (isset($_GET['platoons']) && isset($_GET['session_id'])) {

    $platoons = $_GET['platoons'];
    $session_id = $_GET['session_id'];

    $stmt = "SELECT * FROM registration
    LEFT JOIN platoons_tb
    ON registration.platoon=platoons_tb.platoons
    WHERE registration.session_id='$session_id' AND platoons_tb.platoons='$platoons'";
?>

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

        <h6>Platoon: <?php echo $platoons ?></h6>
        <section>
            <table class="table table-bordered border-dark">
                <thead>
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">REG NO.</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">PHONE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num = 1;
                    foreach ($result as $row) { ?>

                        <tr>
                            <th scope="row"><?php echo $num++; ?></th>
                            <td><?php echo $row['regno'] ?></td>
                            <td><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] ?></td>
                            <td><?php echo $row['emailid'] ?></td>
                            <td><?php echo $row['mobno'] ?></td>
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