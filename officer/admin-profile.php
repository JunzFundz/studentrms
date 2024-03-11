<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
	header('location:logout.php');
} else {


	if (isset($_POST['submit'])) {
		$aid = $_SESSION['aid'];
		$aname = $_POST['adminname'];
		$aemail = $_POST['aemailid'];


		$query = mysqli_query($con, "update tbl_login set FullName='$aname',AdminEmail='$aemail' where id='$aid'");
		if ($query) {
			echo '<script>alert("Admin Profile updated successfully")</script>';
			echo "<script>window.location.href='admin-profile.php'</script>";
		}
	}

?>

<?php include('header.php') ?>

	</head>

	<body>
		<form method="post">
			<div id="wrapper">

				<div class="container-div">

					<div class="navigation">
					<?php include('admin-header.php') ?>
					</div>

					<div class="side-panel">
						<?php include('leftbar.php') ?>
					</div>

					<div class="right-panel">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<?php
									$adminid = intval($_SESSION['aid']);
									$query = mysqli_query($con, "SELECT * FROM tbl_login where id='$adminid'");
									$sn = 1;
									while ($res = mysqli_fetch_array($query)) { ?>


										<div class="panel-heading"><b>Edit Admin Profile</b></div>
										<div class="panel-body">
											<div class="row">
												<div class="col-lg-10">


													<div class="form-group">
														<div class="col-lg-4">
															<label>Name</label>
														</div>
														<div class="col-lg-6">
															<input class="form-control" name="adminname" id="adminname" value="<?php echo $res['FullName']; ?>" required="required">
														</div>
													</div> <br><br>

													<div class="form-group">
														<div class="col-lg-4">
															<label>Email id</label>
														</div>
														<div class="col-lg-6">
															<input class="form-control" name="aemailid" id="aemailid" value="<?php echo $res['AdminEmail']; ?>" required="required">
														</div>
													</div>

													<br><br>
													<div class="form-group">
														<div class="col-lg-4">
															<label>Logind Id/ username</label>
														</div>
														<div class="col-lg-6">
															<input class="form-control" name="loginid" id="loginid" value="<?php echo $res['loginid']; ?>" disabled required="required">
															<small style="color:red;">Logind Id/ username can't be edit</small>
														</div>
													</div> <br><br>

												<?php }  ?>

												<div class="form-group">
													<div class="col-lg-4"></div>
													<div class="col-lg-6"><br><br><input type="submit" class="btn btn-primary" name="submit" value="Update Profile"></button></div>
												</div>
												</div>
											</div>

										</div>

								</div>

							</div>

						</div>
					</div>

				</div>
			</div>

            <?php 
            include('add-platoon.php');
            include('add-officer.php');
            include('footer.php');
            ?>


		</form>
	</body>

	</html>
<?php } ?>