<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {

		$platoon = $_POST['platoon'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$gname = $_POST['gname'];
		$ocp = $_POST['ocp'];
		$gender = $_POST['gender'];
		$nation = $_POST['nation'];
		$mobno = $_POST['mobno'];
		$email = $_POST['email'];
		$pro = $_POST['pro'];
		$city = $_POST['city'];
		$paddress = $_POST['padd'];
		$caddress = $_POST['cadd'];
		$session = $_POST['session'];
		$sessionid = $_POST['sessionid'];
		$regno = mt_rand(1000000000, 9999999999);

		$query = mysqli_query($con, "INSERT INTO registration (platoon,fname, mname, lname, gender, gname, ocp, nationality, mobno, emailid, pro, city, padd, cadd, session, session_id, regno) 
		VALUES ('$platoon','$fname','$mname','$lname', '$gender', '$gname','$ocp','$nation','$mobno','$email','$pro','$city','$paddress','$caddress','$session', '$sessionid', '$regno')");
		if ($query) {
			echo '<script>alert("Student Registration successfull")</script>';
		} else {
			echo '<script>alert("Something went wrong. Please try again")</script>';
			echo "<script>window.location.href='add.php'</script>";
		}
	}

?>

<?php include('header.php') ?>

	</head>

	<body>
		<form method="post">
			<div class="container-div">

				<div class="navigation">
					<?php include('admin-header.php') ?>
				</div>

				<div class="side-panel">
					<?php include('leftbar.php') ?>
				</div>

				<div class="right-panel">

					<div class="row justify-content-start">
						<div class="col-3">
							<label>Select Platoon<span id="" style="font-size:11px;color:red">*</span></label>
							<select class="form-control" name="platoon" required="required">
								<?php $stmt = "SELECT * FROM platoons_tb";
								$result = mysqli_query($con, $stmt);
								foreach ($result as $rows) { ?>

									<option><?php echo strtoupper($rows['platoons']) ?></option>

								<?php }
								?>
							</select>
						</div>
						<div class="col-3">
							<label>Current Session<span id="" style="font-size:11px;color:red">*</span></label>

							<?php $query = mysqli_query($con, "SELECT * FROM `session` WHERE status=1 ");
							while ($res = mysqli_fetch_array($query)) { ?>
								<input type="hidden" name="sessionid" value="<?php echo htmlentities($res['id']); ?>" readonly>
								<input class="form-control" name="session" value="<?php echo htmlentities($res['session']); ?>" readonly>
							<?php } ?>

						</div>
					</div>
					<br><br>
					<h5 id="title-heading">Personal Informations</h5>
					<br>
					<div class="row justify-content-start">
						<div class="col-2">
							<label>First Name<span id="" style="font-size:11px;color:red">*</span> </label>
							<input class="form-control" name="fname" required="required" pattern="[A-Za-z]+$">
							<br>
							<label>Guardian Name<span id="" style="font-size:11px;color:red">*</span> </label>
							<input class="form-control" name="gname" required="required">
						</div>

						<div class="col-2">
							<label>Middle Name</label>
							<input class="form-control" name="mname">
							<br>
							<label>Occupation</label>
							<input class="form-control" name="ocp" id="ocp">
						</div>

						<div class="col-2">
							<label>Last Name</label>
							<input class="form-control" name="lname" pattern="[A-Za-z]+$">
							<br>
							<label>Nationality<span id="" style="font-size:11px;color:red">*</span></label>
							<input class="form-control" name="nation" id="nation">
						</div>

						<div class="col-2">
							<label>Gender</label>
							<select class="form-select" aria-label="Default select example" name="gender">
								<option selected>Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="other">other</option>
							</select>
						</div>
					</div>

					<br><br>
					<h5 id="title-heading">Contact Informations</h5>
					<br>
					<div class="row justify-content-start">
						<div class="col-3">
							<label>Mobile Number<span id="" style="font-size:11px;color:red">*</span> </label>
							<input class="form-control" type="number" name="mobno" required="required" maxlength="10">
							<br>
							<label>Province</label>
							<input class="form-control" name="pro" pattern="[A-Za-z]+$">
							<br>
							<label>Permanent Address<span id="" style="font-size:11px;color:red">*</span></label>
							<textarea class="form-control" rows="3" name="padd" id="padd"></textarea>
						</div>
						<div class="col-3">
							<label>Email</label>
							<input class="form-control" type="email" name="email">
							<br>
							<label>City</label>
							<input class="form-control" name="city">
							<br>
							<label>Correspondence Address<span id="" style="font-size:11px;color:red">*</span></label>
							<textarea class="form-control" rows="3" name="cadd" id="cadd"></textarea>
						</div>
					</div>
					<div class="col-2">
						<br>
						<input type="submit" class="btn btn-primary" name="submit" value="Register"></button>
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

		<!-- Custom Theme JavaScript -->
		<script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
		<script src="admin.js"></script>
	</body>

	</html>
<?php } ?>