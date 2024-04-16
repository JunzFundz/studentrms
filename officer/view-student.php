<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$stmt = "SELECT * FROM student_info WHERE id=" . $id;
		$result = mysqli_query($con, $stmt);
	}
?>

<title>View Student</title>
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
			<input disabled style="color: black; cursor:not-allowed;" type="text" name="id" value="<?php echo @$_GET["id"]; ?>" hidden />
			<div class="container-div">

				<div class="navigation">
					<?php include('admin-header.php') ?>
				</div>

				<div class="side-panel">
					<?php include('leftbar.php') ?>
				</div>

				<div class="right-panel">
					<?php foreach($result as $row){ ?>

					<div class="container text-left" style="padding: 0;">
						<div class="row g-3">
							<div class="col-sm-4">
								<label>Select company<span id="" style="font-size:11px;color:red">*</span></label>
								<select class="form-select" disabled style="color: black; cursor:not-allowed;" name="comp" required="required">
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
									<input disabled style="color: black; cursor:not-allowed;" type="hidden" name="sessionid" value="<?php echo htmlentities($res['sid']); ?>" readonly>
									<input disabled style="color: black; cursor:not-allowed;" class="form-control" name="session" value="<?php echo htmlentities($res['session']); ?>" readonly>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="container text-left" style="padding: 0;">
						<div class="row g-3">
							<div class="col-sm-4">
								<label>Course<span id="" style="font-size:11px;color:red">*</span> </label>
								<select class="form-select" disabled style="color: black; cursor:not-allowed;" name="course" required="required">
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
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['major'] ?>" name="major">
							</div>

							<div class="col-sm-3">
								<label>Semester<span id="" style="font-size:11px;color:red">*</span> </label>
								<select class="form-select" disabled style="color: black; cursor:not-allowed;" name="semester" required="required">
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
								<input disabled style="color: black; cursor:not-allowed;" class="form-control"  value = "<?php echo $row['fname'] ?>" name="fname" required="required">
							</div>

							<div class="col-sm-3">
								<label>(MI)</label><span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control"  value = "<?php echo $row['mi'] ?>" name="mi">
							</div>

							<div class="col-sm-3">
								<label>Last Name<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control"  value = "<?php echo $row['lname'] ?>" name="lname">
							</div>

							<div class="col-sm-3">
								<label>Gender</label>
								<select class="form-select" disabled style="color: black; cursor:not-allowed;" aria-label="Default select example" name="gender">
									<option selected>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="other">other</option>
								</select>
							</div>

							<div class="col-sm-6">
								<label>Place of birth<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control"  value = "<?php echo $row['pbirth'] ?>" name="pbirth" required="required">
							</div>

							<div class="col-sm-3">
								<label>Date of Birth</label><span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control"  value = "<?php echo $row['dob'] ?>" name="dob" type="date">
							</div>

							<div class="col-sm-3">
								<label>Blood type<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['btype'] ?>" name="btype">
							</div>

							<div class="col-sm-3">
								<label>Religion<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['religion'] ?>" name="religion" required="required">
							</div>

							<div class="col-sm-3">
								<label>Region</label><span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['region'] ?>" name="region">
							</div>

							<div class="col-sm-3">
								<label>Civil Status<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['civil'] ?>" name="civil">
							</div>

							<div class="col-sm-3">
							<label>Phone<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['phone'] ?>" name="phone">
							</div>

							<div class="col-sm-6">
							<label>Permanet Address<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['address'] ?>" name="address">
							</div>

							<div class="col-sm-3">
							<label>Father's Name<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['father'] ?>" name="father">
							</div>

							<div class="col-sm-3">
							<label>Occupation<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['f_occupation'] ?>" name="f_occupation">
							</div>

							<div class="col-sm-3">
							<label>Mother's Name<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['mother'] ?>" name="mother">
							</div>

							<div class="col-sm-3">
							<label>Occupation<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['m_occupation'] ?>" name="m_occupation">
							</div>
							
							<div class="col-sm-3">
							<label>ROTC Grade (1st Semester)<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['rotc_grade'] ?>" name="rotc_grade">
							</div>

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
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['person_name'] ?>" name="person_name">
							</div>

							<div class="col-sm-4">
							<label>Relationship<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['person_relationship'] ?>" name="person_relationship">
							</div>
							
							<div class="col-sm-4">
							<label>Address<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['person_add'] ?>" name="person_add">
							</div>

							<div class="col-sm-4">
							<label>Phone<span id="" style="font-size:11px;color:red">*</span></label>
								<input disabled style="color: black; cursor:not-allowed;" class="form-control" value = "<?php echo $row['person_phone'] ?>" name="person_phone">
							</div>

						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</form>

		<?php
		include('load-modals.php');
		include('footer.php');
		?>
	<?php } ?>