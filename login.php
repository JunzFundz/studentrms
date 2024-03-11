<?php session_start();
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $uname = $_POST['id'];
    $password = $_POST['password'];

    $query = "SELECT ID, loginid FROM tbl_login WHERE loginid=? AND password=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $uname, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['aid'] = $row['ID'];
        $_SESSION['login'] = $row['loginid'];

        if ($row['ID'] === 1) {
            $_SESSION['login'] = $row['loginid'];
            header('Location: admin/dashboard.php');
        } else {
            header('Location: officer/dashboard.php');
        }
    } else {
        echo '<script>alert("Invalid")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Cadets Record Management System | Login </title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../dist/css/jquery.validate.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        body {
            background-color: #837960;
            background-image: linear-gradient(to bottom, transparent, #837960), url("bg.jpg");
            opacity: 0.9;
            background-repeat: no-repeat;
            font-family: 'Rubik', sans-serif;
            height: 100vh;
        }

        .login-form {
            background: #fff;
            width: 500px;
            margin: 65px auto;
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            border-radius: 4px;
            box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
        }

        .login-form h1 {
            padding: 35px 35px 0 35px;
            font-weight: 300;
        }

        .login-form .content {
            padding: 35px;
            text-align: center;
        }

        .login-form .input-field {
            padding: 12px 5px;
        }

        .login-form .input-field input {
            font-size: 16px;
            display: block;
            font-family: 'Rubik', sans-serif;
            width: 100%;
            padding: 10px 1px;
            border: 0;
            border-bottom: 1px solid #747474;
            outline: none;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .login-form .input-field input::-webkit-input-placeholder {
            text-transform: uppercase;
        }

        .login-form .input-field input::-moz-placeholder {
            text-transform: uppercase;
        }

        .login-form .input-field input:-ms-input-placeholder {
            text-transform: uppercase;
        }

        .login-form .input-field input::-ms-input-placeholder {
            text-transform: uppercase;
        }

        .login-form .input-field input::placeholder {
            text-transform: uppercase;
        }

        .login-form .input-field input:focus {
            border-color: #222;
        }

        .login-form a.link {
            text-decoration: none;
            color: #747474;
            letter-spacing: 0.2px;
            text-transform: uppercase;
            display: inline-block;
            margin-top: 20px;
        }

        .login-form .action {
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            flex-direction: row;
        }

        .login-form .action button {
            width: 100%;
            border: none;
            padding: 18px;
            font-family: 'Rubik', sans-serif;
            cursor: pointer;
            text-transform: uppercase;
            background: #e8e9ec;
            color: #777;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 0;
            letter-spacing: 0.2px;
            outline: 0;
            -webkit-transition: all .3s;
            transition: all .3s;
        }

        .login-form .action button:hover {
            background: #d8d8d8;
        }

        .login-form .action button:nth-child(2) {
            background: #2d3b55;
            color: #fff;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 4px;
        }

        .login-form .action button:nth-child(2):hover {
            background: #3c4d6d;
        }
    </style>
</head>

<body class="bg-page">
    <br>
    <h1 align="center" style="color: #fff;">CADETS RECORD MANAGEMENT SYSTEM IN NORSU ROTC BAIS UNIT</h1>
    <div class="">
        <br><br><br><br>

        <!-- partial:index.partial.html -->
        <div class="login-form">

            <form method="post">
                <h1>Login</h1>
                <div class="content">
                    <div class="input-field">
                        <input type="text" id="id" name="id" placeholder="Username" autocomplete="nope">
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="action">
                    <button type="submit" name="submit">Sign in</button>
                </div>
            </form>
        </div>
        <!-- partial -->

    </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="dist/jquery-1.3.2.js" type="text/javascript"></script>
    <script src="dist/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
        let form = document.querySelecter('form');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            return false;
        });

        jQuery(function() {
            jQuery("#id").validate({
                expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                message: "Should be a valid id"
            });
            jQuery("#password").validate({
                expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                message: "Should be a valid password"
            });

        });
    </script>
</body>

</html>