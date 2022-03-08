<?php session_start();
include("includes/header.inc.php");
?>
<div id="header-wrapper">
	<div id="header">
		<div id="menu">
			<?php
			include("includes/menu.inc.php");
			if (isset($_SESSION['msg-danger'])) {
				echo $_SESSION['msg-danger'];
				session_unset();
			}
			if (isset($_SESSION['msg-success'])) {
				echo $_SESSION['msg-success'];
				session_unset();
			}
			?>
		</div>
		<!-- end #menu -->
		<div id="search">
			<?php
			include("search.inc.php");
			?>
		</div>
		<!-- end #search -->
	</div>
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<div id="logo">
	<?php
	include("includes/logo.inc.php");
	?>
</div>
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<hr />
			<!-- end #logo -->
			<div id="content">
				<div class="post px-0">
					<div class="col-12 register-page">
						<div class="card shadow">
							<h3 class="py-4 border-bottom border-primary text-center mb-5">Employee(Jobseeker) Sign-up Form</h3>
							<form action="process_employee_register.php" method="post" enctype="multipart/form-data" class="col-lg-11 mx-auto">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="name">First Name</label>
										<input type="text" class="form-control" name="fnm" required placeholder="Enter your first name">
									</div>
									<div class="form-group col-md-6">
										<label for="lnm">Last Name</label>
										<input type="text" class="form-control" id="lnm" name="lnm" required placeholder="Enter your Last">
									</div>
								</div>
								<div class="form-group">
									<label for="addr">Address</label>
									<input type="text" class="form-control" id="address" name="addr" required placeholder="Enter your address">
								</div>
								<div class="form-group">
									<label for="inputEmail">Email</label>
									<input type="email" class="form-control" id="inputEmail" name="email" required placeholder="Enter your email">
								</div>
								<div class="form-row">
									<div class="form-group col-lg-3">
										<label for="country">Your Country</label>
										<select name="country" class="form-control" id="country">
											<option value="1">kenya</option>
											<option value="2">Nigeria</option>
											<option value="3">USA</option>
											<option value="4">Liberia</option>
											<option value="5">Canada</option>
											<option value="6">Japan</option>
											<option value="7">Israel</option>
										</select>
									</div>
									<div class="form-group col-lg-5">
										<label for="phone_no">Phone Number</label>
										<input type="text" class="form-control" id="phone_no" name="phno" required placeholder="+254...">
									</div>
								</div>
								<div class="form-group">
									<label for="cl">Current Location</label>
									<input type="text" class="form-control" name="cl" id="cl" required placeholder="Enter your location">
								</div>
								<div class="form-group">
									<label for="quali">Qualification</label>
									<input type="text" class="form-control" name="quali" id="quali" required placeholder="Enter your education level">
								</div>
								<div class="form-group">
									<label for="resume">Upload your Resume</label>
									<input type="file" name="resume" id="resume">
								</div>
								<div class="form-group">
									<label for="inputPassword">Create Password</label>
									<input type="password" class="form-control" name="pwd" id="inputPassword" required placeholder="Enter your preferred password">
								</div>
								<div class="form-group">
									<label for="inputPassword">Confirm Password</label>
									<input type="password" class="form-control" name="pwd" id="inputPassword" required placeholder="Enter your preferred password">
								</div>
								<div class="form-group offset-lg-8 py-3 mb-5">
									<button type="submit" class="btn btn-sm rounded-sm d-block clearfix float-right bg-info text-light font-weight-bold">Sign Up</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- end #content -->
		<div id="sidebar">
			<?php
			include("includes/sidebar.inc.php");
			?>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
</div>
<!-- end #page -->
<div id="footer-bgcontent">
	<div id="footer">
		<?php
		include("includes/footer.inc.php");
		?>
	</div>
</div>
<!-- end #footer -->