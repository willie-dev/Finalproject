<?php session_start();
if (!(isset($_SESSION['admin']))) {
	header("location:login.php");
}
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
			include("includes/search.inc.php");
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


					<div class="entry">
						<br>
						<table width="100%" class="table table-borderless" border="0">

							<tr>
								<td width="25%"><b>NAME</b>
								<td width="65%"><b>QUERY</b>
								<td width="10%"><b>View all</b>
							</tr>



							<?php
							$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
							echo '<h2 class="text-light pb-3">
							Users who have recently contacted you
							</h2>';

							$q = "select * from contact limit 2";
							$res = $link->query($q) or die("can not connect");

							while ($row = mysqli_fetch_assoc($res)) {
								echo '
							<tr>
							<td>
							' . $row['cont_fnm'] . '<br><small>' . $row['cont_email'] . '</small><br><br>
							<td>' . $row['cont_query'] . '
							<td><a href="contact.php" class="btn btn-info btn-sm px-4 py-1">See</a>
							</tr>

					';
							}
							?>
						</table>
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
