<?php session_start();
if (!isset($_SESSION['status'])) {
	header("location:index.php");
}
include("includes/header.inc.php");
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("cant connect");

$q = "select * from jobs where j_owner_name='" . $_SESSION['fnm'] . "'";

$res = $link->query($q) or die("wrong query");

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
				<div class="post">

					<h2 class="title">Manage jobs</h2>
					<p class="meta"></p>
					<div class="entry text-white">
						<div class="card rounded-0 mb-3">
							<h3 class="text-info text-center px-2 py-1">
								<b> All your current jobs </b>
							</h3>
						</div>
						<table class="table  table-hover" width="100%">

							<tr class="pb-4">

								<td width="10%">No.</td>
								<td width="20%">Job title</td>
								<td width="40%">View Applicants</td>
								<td width="30%">delete</td>

							</tr>
							<tr rowspan="1"></tr>
							<tr>
								<?php
								$count = 1;
								while ($row = mysqli_fetch_array($res)) {
									echo '<tr> <td width="10%">' . $count . '
								<td width="40%"><a href="job_details.php?id=' . $row['j_id'] . '">' . $row['j_title'] . '
								<td width="20%"><a class="btn btn-sm btn-info py-0 px-3" href="show.php?id='. $row['j_id'] . '&nm=' . $row['j_title'] . '">View</a>
								<td><a class="btn btn-sm btn-danger py-0 px-3" href="process_del_job.php?id=' . $row['j_id'] . '">delete</a></tr>';
									$count++;
								} ?>
							<tr></tr>
						</table>
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