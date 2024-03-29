<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_GET['stud_id'])) {
		$stud_id = $_GET['stud_id'];

		$stmt = "SELECT * FROM registration WHERE stud_id=" . $stud_id;
		$result = mysqli_query($con, $stmt);
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

		<form method="post" action="db_update.php">
			<input type="text" name="stud_id" value="<?php echo @$_GET["stud_id"]; ?>" hidden />

			<div class="container-div">

				<div class="navigation">
					<?php include('admin-header.php') ?>
				</div>

				<div class="side-panel">
					<?php include('leftbar.php') ?>
				</div>

				<div class="right-panel">


					<div class="row justify-content-start">
						<?php foreach ($result as $row) { ?>
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
							<input class="form-control" name="fname" required="required" pattern="[A-Za-z]+$" value="<?php echo $row['fname'] ?>">
							<br>
							<label>Guardian Name<span id="" style="font-size:11px;color:red">*</span> </label>
							<input class="form-control" name="gname" required="required" value="<?php echo $row['gname'] ?>">
						</div>

						<div class="col-2">
							<label>Middle Name</label>
							<input class="form-control" name="mname" value="<?php echo $row['mname'] ?>">
							<br>
							<label>Occupation</label>
							<input class="form-control" name="ocp" id="ocp" value="<?php echo $row['ocp'] ?>">
						</div>

						<div class="col-2">
							<label>Last Name</label>
							<input class="form-control" name="lname" pattern="[A-Za-z]+$" value="<?php echo $row['lname'] ?>">
							<br>
							<label>Nationality<span id="" style="font-size:11px;color:red">*</span></label>
							<input class="form-control" name="nation" id="nation" value="<?php echo $row['nationality'] ?>">
						</div>

						<div class="col-2">
							<label>Gender</label>
							<select class="form-select" aria-label="Default select example" name="gender" value="">
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
							<input class="form-control" type="number" name="mobno" required="required" maxlength="10" value="<?php echo $row['mobno'] ?>">
							<br>
							<label>Province</label>
							<input class="form-control" name="pro" pattern="[A-Za-z]+$" value="<?php echo $row['pro'] ?>">
							<br>
							<label>Permanent Address<span id="" style="font-size:11px;color:red">*</span></label>
							<textarea class="form-control" rows="3" name="padd" id="padd"><?php echo $row['padd'] ?></textarea>
						</div>
						<div class="col-3">
							<label>Email</label>
							<input class="form-control" type="email" name="email" value="<?php echo $row['emailid'] ?>">
							<br>
							<label>City</label>
							<input class="form-control" name="city" pattern="[A-Za-z]+$" value="<?php echo $row['city'] ?>">
							<br>
							<label>Correspondence Address<span id="" style="font-size:11px;color:red">*</span></label>
							<textarea class="form-control" rows="3" name="cadd" id="cadd"><?php echo $row['cadd'] ?></textarea>
						</div>
					</div>
					<br>
					<input type="submit" class="btn btn-primary submit-btn" name="submit" value="Register"></button>
					<br><br><br><br>

				<?php } ?>
				</div>

			</div>
		</form>

		<?php
		include('add-platoon.php');
		include('add-officer.php');
		include('footer.php');
		?>
<?php } ?>