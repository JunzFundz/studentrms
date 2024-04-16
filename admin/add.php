<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
	header('location: ../logout.php');
} else {
?>
<title>Add</title>

	<?php include('header.php') ?>

	</head>
	<body>
		<form method="post" action="db_register.php">
			<div class="container-div">
				<div class="navigation">
					<?php include('admin-header.php') ?>
				</div>

				<div class="side-panel">
					<?php include('leftbar.php') ?>
				</div>

				<div class="right-panel">
					<!-- other -->
					<div class="container text-left" style="padding: 0;">
						<div class="row row-cols-2 row-cols-lg-5 g-2">
							<div class="col">
								<div class="p-3">

								</div>
							</div>
							<div class="col">
								<div class="p-3">
								</div>
							</div>
						</div>
					</div>

					<div class="container text-left" style="padding: 0;">
						<div class="row g-3">
							<div class="col-sm-4">
								<label>Select company<span id="" style="font-size:11px;color:red">*</span></label>
								<select class="form-select" name="comp" required="required">
									<?php $stmt = "SELECT * FROM comp_tb";
									$result = mysqli_query($con, $stmt);
									foreach ($result as $rows) { ?>
										<option><?php echo strtoupper($rows['comp']) ?></option>
									<?php }
									?>
								</select>
							</div>

							<div class="col-sm-3">
								<label>Current Session<span id="" style="font-size:11px;color:red">*</span></label>
								<?php $query = mysqli_query($con, "SELECT * FROM `session` WHERE status=1 ");
								while ($res = mysqli_fetch_array($query)) { ?>
									<input type="hidden" name="sessionid" value="<?php echo htmlentities($res['sid']); ?>" readonly>
									<input class="form-control" name="session" value="<?php echo htmlentities($res['session']); ?>" readonly>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="container text-left" style="padding: 0;">
						<div class="row g-3">
							<div class="col-sm-4">
								<label>Course<span id="" style="font-size:11px;color:red">*</span> </label>
								<select class="form-select" name="course" required="required">
									<?php $stmt = "SELECT * FROM course";
									$result = mysqli_query($con, $stmt);
									foreach ($result as $rows) { ?>
										<option><?php echo $rows['c_name'] ?></option>
									<?php }
									?>
								</select>
							</div>

							<div class="col-sm-3">
								<label>Major</label><span id="" style="font-size:11px;color:red">*</span></label>
								<input class="form-control" name="major">
							</div>

							<div class="col-sm-3">
								<label>Semester<span id="" style="font-size:11px;color:red">*</span> </label>
								<select class="form-select" name="semester" required="required">
									<?php $stmt = "SELECT * FROM semester";
									$result = mysqli_query($con, $stmt);
									foreach ($result as $rows) { ?>
										<option><?php echo $rows['sem'] ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
					</div>

					<br>
					<br>
					<h5 id="title-heading">PERSONAL INFORMATION</h5>
					<div style="height: 2px; width:100%; background-color:grey; margin-block:30px"></div>

					<div class="container text-left" style="padding: 0;">
						<div class="row g-3">
							<div class="col-sm-3">
								<label>First Name<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="fname" required="required">
							</div>

							<div class="col-sm-3">
								<label>(MI)</label><span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="mi">
							</div>

							<div class="col-sm-3">
								<label>Last Name<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="lname">
							</div>

							<div class="col-sm-3">
								<label>Gender</label>
								<select class="form-select" aria-label="Default select example" name="gender">
									<option selected>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="other">other</option>
								</select>
							</div>

							<div class="col-sm-6">
								<label>Place of birth<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="pbirth" required="required">
							</div>

							<div class="col-sm-3">
								<label>Date of Birth</label><span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="dob" type="date">
							</div>

							<div class="col-sm-3">
								<label>Blood type<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="btype">
							</div>

							<div class="col-sm-3">
								<label>Religion<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="religion" required="required">
							</div>

							<div class="col-sm-3">
								<label>Region</label><span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="region">
							</div>

							<div class="col-sm-3">
								<label>Civil Status<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="civil">
							</div>

							<div class="col-sm-3">
							<label>Phone<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="phone">
							</div>

							<div class="col-sm-6">
							<label>Permanet Address<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="address">
							</div>

							<div class="col-sm-3">
							<label>Father's Name<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="father">
							</div>

							<div class="col-sm-3">
							<label>Occupation<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="f_occupation">
							</div>

							<div class="col-sm-3">
							<label>Mother's Name<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="mother">
							</div>

							<div class="col-sm-3">
							<label>Occupation<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="m_occupation">
							</div>
							
							<!-- <div class="col-sm-3">
							<label>ROTC Grade (1st Semester)<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="rotc_grade">
							</div> -->

						</div>
					</div>

					<br>
					<br>
					<h5 id="title-heading">PERSON TO BE NOTIFIED IN CASE OF EMERGENCY</h5>
					<div style="height: 2px; width:100%; background-color:grey; margin-block:30px"></div>

					<div class="container text-left" style="padding: 0;">
						<div class="row g-3">
							<div class="col-sm-4">
							<label>Name<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="person_name">
							</div>

							<div class="col-sm-4">
							<label>Relationship<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="person_relationship">
							</div>
							
							<div class="col-sm-4">
							<label>Address<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="person_add">
							</div>

							<div class="col-sm-4">
							<label>Phone<span id="" style="font-size:11px;color:red">*</span></label>
								<input required class="form-control" name="person_phone">
							</div>

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
		include('load-modals.php');
		include('footer.php');
		?>

		<!-- Custom Theme JavaScript -->
		<script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
		<script src="admin.js"></script>
	</body>

	</html>
<?php } ?>