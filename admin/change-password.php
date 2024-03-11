<?php session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['aid'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {
		$adminid = $_SESSION['aid'];
		$cpassword = $_POST['currentpassword'];
		$newpassword = $_POST['newpassword'];
		$query = mysqli_query($con, "select id from tbl_login where id='$adminid' and   password='$cpassword'");
		$row = mysqli_fetch_array($query);
		if ($row > 0) {
			$ret = mysqli_query($con, "update tbl_login set password='$newpassword' where id='$adminid'");
			echo '<script>alert("Your password successully changed.")</script>';
		} else {

			echo '<script>alert("Your current password is wrong.")</script>';
		}
	}
?>
	<?php include('header.php') ?>

	<script type="text/javascript">
		function checkpass() {
			if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
				alert('New Password and Confirm Password field does not match');
				document.changepassword.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>


	<div class="container-div">

		<div class="navigation">
			<?php include('admin-header.php') ?>
		</div>

		<div class="side-panel">
			<?php include('leftbar.php') ?>
		</div>

		<div class="right-panel">
			<form method="post">
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">Admin Change Password</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-10">
										<form class="form-validate form-horizontal" method="post" action="" name="changepassword" onsubmit="return checkpass();">
											<div class="form-group">
												<div class="col-lg-4">
													<label>Current Password<span id="" style="font-size:11px;color:red">*</span> </label>
												</div>
												<div class="col-lg-6">

													<input type="password" name="currentpassword" class=" form-control" required="true" value="">
												</div>

											</div>

											<br><br>

											<div class="form-group">
												<div class="col-lg-4">
													<label>New Password<span id="" style="font-size:11px;color:red">*</span></label>
												</div>
												<div class="col-lg-6">
													<input type="password" name="newpassword" id="newpassword" class="form-control" value="" required>
												</div>
											</div>

											<br><br>

											<div class="form-group">
												<div class="col-lg-4">
													<label>Confirm Password</label>
												</div>
												<div class="col-lg-6">
													<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" value="" required>

												</div>
											</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">

										</div>
										<div class="col-lg-6"><br><br>
											<input type="submit" class="btn btn-primary" name="submit" value="Change"></button>
										</div>
									</div>
								</div>
			</form>
		</div>
		
	</div>

	<?php
	include('add-platoon.php');
	include('add-officer.php');
	include('footer.php');
	?>
<?php } ?>