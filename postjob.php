<?php session_start();
?>
<?php
include("includes/header.inc.php");
?>
<div id="header-wrapper">
	<div id="header">
		<div id="menu">
			<?php
			include("includes/menu.inc.php");
			// if (isset($_SESSION['msg-danger'])) {
			// 	echo $_SESSION['msg-danger'];
			// 	session_unset();
			// }
			if (isset($_SESSION['msg-success'])) {
				echo $_SESSION['msg-success'];
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
				<div class="post col-12">
					<div class="postjob-page">
						<div class="card shadow border-info">
							<h3 class="py-4 border-bottom border-info text-center">POST JOB</h3>
							<h4 class="meta pl-4 mb-3">JOB SPECIFICATIONS</h4>
							<form action="process_postjob.php" method="post" enctype="multipart/form-data" class="col-md-11 mx-auto">
								<div class="form-group">
									<label for="name">Job TItle</label>
									<input type="text" class="form-control" name="title" placeholder="Enter the job title">
								</div>
								<div class="form-group">
									<label for="categories">CATEGORIES</label>
									<select name="cat" class="form-control" id="categories">
										<?php
										$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("cant connect");
										$q = "select * from categories";
										$res = $link->query($q) or die('wrong query');
										while ($row = mysqli_fetch_assoc($res)) {
											echo "<option>" . $row['cat_nm'];
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="hours">Working Hours(Hrs)</label>
									<input type="number" class="form-control" name="hours" id="cnm" placeholder="Enter working duration in hours">
								</div>
								<div class="form-group">
									<label for="salary">Salary</label>
									<input type="number" class="form-control" name="salary" placeholder="salary for this job"></input>
								</div>
								<div class="form-group">
									<label for="experience">Experience (years)</label>
									<input type="number" class="form-control" name="experience" id="experience" placeholder="Required Experience for the job">
								</div>
								<div class="form-group">
									<label for="disc">Job description</label>
									<textarea class="form-control" name="disc" placeholder="eg what is entails"></textarea>
								</div>
								<div class="form-group">
									<label for="city">Job location/City</label>
									<input type="text" class="form-control" name="city" id="city" placeholder="Enter job location">
								</div>
								<div class="form-group offset-lg-8 py-3 mb-5">
									<button type="submit" class="btn btn-md rounded-sm d-block clearfix float-right bg-success text-light font-weight-bold">Submit Now</button>
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
