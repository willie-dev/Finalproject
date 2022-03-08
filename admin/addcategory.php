<?php session_start();
if (!(isset($_SESSION['admin']))) {
	header("location:login.php");
}
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
include("includes/header.inc.php");
?>
<div id="header-wrapper">
	<div id="header">
		<div id="menu">
			<?php
			include("includes/menu.inc.php");
			if (isset($_SESSION['msg-success'])) {
				echo $_SESSION['msg-success'];
			}
			?>
		</div>
		<!-- end #menu -->
		<div id="search">
			<?php
			include("../search.inc.php");
			?>
			<div class="text-center">
				<img src="images/jobs4you-logo.png" alt="" width="150">
			</div>
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
				<div class="text-light">
					<div class="post">

						<h2 class="title text-light">Add category</h2>
						<p class="meta"></p>
						<div class="entry">

							<form action="process_addcategories.php" method="post" class="px-3">
								<div class="form-group">
									<input type="text" class="form-control" name="nm" placeholder="Enter a Job category" required>
								</div>

								<div class="form-group offset-lg-8 py-3 mb-5">
									<button type="submit" name="add" class="btn btn-sm px-3 d-block clearfix float-right bg-info text-light font-weight-bold">Add</button>
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
	</div>
</div>
<div class="mb-5" style="clear: both;">&nbsp;</div>
<!-- end #page -->
<div id="footer">
	<?php
	include("includes/footer.inc.php");
	?>
</div>
<!-- end #footer -->