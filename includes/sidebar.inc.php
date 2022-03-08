<div class="card shadow-sm pr-3 py-4">
	<?php
	$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can't connect");
	if (isset($_SESSION['status'])) {
		echo '<h4 class="title text-info text-center"><i>You are logged in as</h4></i>';
		echo '<h2 class="title text-success text-center">' . $_SESSION['fnm'] . ' ' . $_SESSION['lnm'] . '!</h2>';
		if (isset($_SESSION['employee'])) {
			echo '<div class="col-6 mx-auto">
		         <a href="#editEmployeeProfile" data-toggle="modal" data-target="#editEmployeeProfile" class="btn btn-sm rounded-sm bg-info font-weight-bold text-light border-primary btn-log py-1 px-3 my-1">Edit profile</a></div>';
		} elseif (isset($_SESSION['employer'])) {
			echo '<div class="col-6 mx-auto">
		         <a href="#editEmployerProfile" data-toggle="modal" data-target="#editEmployerProfile" class="btn btn-sm rounded-sm bg-info font-weight-bold text-light border-primary btn-log py-1 px-3 my-1">Edit profile</a></div>';
		}
	} else {
		echo '
						<form class ="p-2 pl-4" action="process_login.php" method=POST>
							<div class="form-group">
	                            <label for="email">Username</label>
								<input type="text" class="form-control" name="email" placeholder="Enter your email">
								</div>
						<div class="form-group">
								<label for="pwd">Password</label>
								<input type="password" class="form-control" name="pwd" placeholder="Enter your password">
						</div>
						<div class="form-group">
								<label for="type">Type/Role</label>
						         <select class="form-control"name="cat">
								       <option> employee
										<option> employer
								 </select>
					   </div>
			           <div class="form-group offset-lg-8 py-3 mb-5">
								<button type="submit" class="btn btn-sm rounded-sm d-block clearfix float-right bg-info text-light font-weight-bold">Login</button>
						</div>
						</form>
					';
	}
	?>
</div>
<?php if (isset($_SESSION['employee'])) {
	$sql = "SELECT * FROM employees WHERE ee_id={$_SESSION['id']}";
	$result = $link->query($sql) or die('wrong query');
	$data = mysqli_fetch_assoc($result);
}
?>
<div class="modal fade shadow" id="editEmployeeProfile" tabindex="-1" role="dialog" aria-labelledby="editEmployeeProfile" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-md" role="editEmployeeProfile">
		<div class="modal-content border-info shadow">
			<div class="modal-header">
				<h3 class="modal-title" id="login"><b class="pl-4 text-info">About to Edit <?php echo '<span class="text-danger">' . ucfirst($_SESSION['fnm']) . '"</span>' ?>'s Profile</b></h3>
			</div>
			<div class="modal-body p-3">
				<form action="editprofile.php" method="post" enctype="multipart/form-data" class="col-lg-12 mx-auto">
					<input type="hidden" name="editEmployee">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">First Name</label>
							<input type="text" class="form-control" name="fnm" value="<?php echo $data['ee_fnm']; ?>" placeholder="Enter your first name">
						</div>
						<div class="form-group col-md-6">
							<label for="lnm">Last Name</label>
							<input type="text" class="form-control" id="lnm" name="lnm" value="<?php echo $data['ee_lnm']; ?>" placeholder="Enter your Last">
						</div>
					</div>
					<div class="form-group">
						<label for="name">Address</label>
						<input type="text" class="form-control" id="address" value="<?php echo $data['ee_addr']; ?>" name="addr" placeholder="Enter your address">
					</div>
					<div class="form-group">
						<label for="inputEmail">Email</label>
						<input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $data['ee_email']; ?>" placeholder="Enter your email">
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
							<input type="text" class="form-control" id="phone_no" name="phno" value="<?php echo $data['ee_phno']; ?>" placeholder="+254...">
						</div>
					</div>
					<div class="form-group">
						<label for="cl">Current Location</label>
						<input type="text" class="form-control" name="cl" id="cl" value="<?php echo $data['ee_current_location']; ?>" placeholder="Enter your location">
					</div>
					<div class="form-group">
						<label for="quali">Qualification</label>
						<input type="text" class="form-control" name="quali" id="quali" value="<?php echo $data['ee_qualification']; ?>" placeholder="Enter your education level">
					</div>
					<div class="form-group">
						<label for="resume">Upload your Resume</label>
						<input type="file" name="resume" id="resume" value="<?php echo $data['ee_resume']; ?>">
					</div>
					<div class="form-group">
						<label for="inputPassword">Enter Old Password</label>
						<input type="password" class="form-control" name="pwd" value="<?php echo $data['ee_pwd']; ?>" id="inputPassword" placeholder="Enter your preferred password">
					</div>
					<div class="form-group">
						<label for="inputPassword">Enter New Password</label>
						<input type="password" class="form-control" name="pwd_new" value="<?php echo $data['ee_pwd']; ?>" id="inputPassword" placeholder="Enter your preferred password">
					</div>
					<div class="form-group mx-auto py-3 mb-3">
						<button type="submit" class="btn btn-md clearfix float-right bg-info text-light font-weight-bold">Update Profile</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php if (isset($_SESSION['employer'])) {
	$sql = "SELECT * FROM employers WHERE er_id={$_SESSION['id']}";
	$result = $link->query($sql) or die('wrong query');
	$data = mysqli_fetch_assoc($result);
}
?>
<div class="modal fade shadow" id="editEmployerProfile" tabindex="-1" role="dialog" aria-labelledby="editEmployerProfile" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-md" role="editEmployerProfile">
		<div class="modal-content border-info shadow">
			<div class="modal-header">
				<h3 class="modal-title" id="login"><b class="px-1 text-info">You're About to Edit <?php echo '<span class="text-danger">' . ucfirst($_SESSION['fnm']) . '</span>' ?>'s Profile</b></h3>
			</div>
			<div class="modal-body p-3">
				<form action="editprofile.php" method="post" enctype="multipart/form-data" class="col-lg-12 mx-auto">
					<input type="hidden" name="editEmployer">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">First Name</label>
							<input type="text" class="form-control" name="fnm" value="<?php echo $data['er_fnm']; ?>" required placeholder="Enter your first name">
						</div>
						<div class="form-group col-md-6">
							<label for="lnm">Last Name</label>
							<input type="text" class="form-control" id="lnm" name="lnm" value="<?php echo $data['er_lnm']; ?>" required placeholder="Enter your Last">
						</div>
					</div>
					<div class="form-group">
						<label for="address">Company Address</label>
						<input type="text" class="form-control" id="address" name="addr" value="<?php echo $data['er_addr']; ?>" placeholder="Enter your address">
					</div>
					<div class="form-group">
						<label for="inputEmail">Email</label>
						<input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $data['er_email']; ?>" placeholder="Enter your email">
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
							<input type="text" class="form-control" id="phone_no" value="<?php echo $data['er_phno']; ?>" name="phno" placeholder="+254...">
						</div>
					</div>
					<div class="form-group">
						<label for="cnm">Company Name</label>
						<input type="text" class="form-control" name="cnm" id="cnm" value="<?php echo $data['er_company']; ?>" placeholder="Enter your location">
					</div>
					<div class="form-group">
						<label for="profile">Company Profile</label>
						<textarea class="form-control" name="profile" value="<?php echo $data['er_company_profile']; ?>" placeholder="eg activities, mission, goals, and values of the company"></textarea>
					</div>
					<div class="form-group">
						<label for="inputPassword">Enter old Password</label>
						<input type="password" class="form-control" name="pwd" id="inputPassword" value="<?php echo $data['er_pwd']; ?>" placeholder=" Enter your preferred password">
					</div>
					<div class="form-group">
						<label for="inputPassword">Type New Password</label>
						<input type="password" class="form-control" name="pwd_new" value="<?php echo $data['er_pwd']; ?>" id="inputPassword" placeholder="Enter your preferred password">
					</div>
					<div class="form-group py-3 mb-3">
						<div class="form-group mx-auto py-3 mb-3">
							<button type="submit" class="btn btn-md clearfix float-right bg-info text-light font-weight-bold">Update Profile</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_SESSION['employee'])) {
	echo '<div class="card shadow-sm mt-5 py-4">
	<h3 class="px-3 border-bottom pb-2">Job Categories </h3>
	<ul class="pl-3">';
	$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
	$q = "select * from categories";
	$res = $link->query($q) or die("can't connect");
	while ($row = mysqli_fetch_assoc($res)) {
		echo '<li class="mb-2 pt-3"><a href="jobs_by_category.php?cat=' . $row['cat_nm'] . '">' . $row['cat_nm'] . '</a></li>';
	}
	echo '
</ul>
</div>';
	mysqli_close($link);
} else {
	return 0;
}
?>