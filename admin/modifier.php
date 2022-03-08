<?php session_start();
if (!(isset($_SESSION['admin']))) {
	header("location:../index.php");
}
include("includes/header.inc.php");
?>
<div id="header-wrapper">
	<div id="header">
		<div id="menu">
			<?php
			include("includes/menu.inc.php");
			?>
		</div>
		<!-- end #menu -->
		<div id="search">
			<?php

			include("../search.inc.php");
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
			<div class="post">

				<h1 class="text-info card rounded-0 py-2 pl-2">List of All Employers</h1>
				<div class="entry">
					<table border="1" width="100%" class="table">
						<tr>
							<td width="35%"><b>Email</b>
							<td width="55%"><b>Name</b>
							<td width="10%"><b>Action</b>
						</tr>
						<?php
						$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");

						$q = "select * from employers";
						$res = $link->query($q) or die("can not connect");

						while ($row = mysqli_fetch_assoc($res)) {
							echo '
						<tr>
						<td>' . $row['er_email'] . '
						<td>' . $row['er_fnm'] . '  ' . $row['er_lnm'] . '
						<td><a href="process_employers_delete.php?user=' . $row['er_id'] . '" class="btn btn-danger btn-sm px-4 py-1">Delete</a>
						</tr>

				';
						}
						?>
					</table>

				</div>
				<!-- <p class="meta"></p> -->
			</div>

			<h1 class="text-info card rounded-0 py-2 pl-2">List of All Employees</h1>
			<div class="entry">
				<table border="1" width="100%" class="table">

					<tr>
						<td width="35%"><b>Email</b>
						<td width="55%"><b>Name</b>
						<td width="10%"><b>Action</b>
					</tr>

					<?php
					$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");

					$q = "select * from employees";
					$res = $link->query($q) or die("can not connect");

					while ($row = mysqli_fetch_assoc($res)) {
						echo '
						<tr>
						<td>' . $row['ee_email'] . '
						<td>' . $row['ee_fnm'] . ' ' . $row['ee_lnm'] . '
						<td><a href="process_user_delete.php?user=' . $row['ee_id'] . '" class="btn btn-danger btn-sm px-4 py-1">Delete</a>
						</tr>

				';
					}
					?>
				</table>

			</div>
			<p class="meta"></p>
		</div>

	</div>
	<!-- end content -->

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