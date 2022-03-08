<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
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
			?>
		</div>
		<!-- end #menu -->
		<div id="search">
			<?php
			include("search.inc.php");
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
					<?php
					if (isset($_SESSION['employee'])) {
						echo '<h2 class="title text-white mb-3 mt-2">
						<b>WELCOME TO JOBS4YOU !</b>
						<h4 >Apply now, secure a job.</h4>
					</h2>';
					} else if (isset($_SESSION['employer'])) {
						echo '<h2 class="title text-white mb-3 mt-2">
						<b>WELCOME TO JOBS4YOU !</b>
						<h4 >Create a job now, help someone.</h4>
					</h2>';
					} else {
						echo '<h2 class="text-light pb-3">
						Login to your account to see the available jobs for you, or to create more jobs.
					</h2>
					<h4>
						 Jobs4you is you platform, is our platform.
					</h4>';
					}
					?>
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
