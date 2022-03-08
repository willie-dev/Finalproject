<?php session_start();
if (!(isset($_SESSION['admin']))) {
	header("location:../index.php");
}
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
$q = "select * from jobs where j_active=0";
$res = $link->query($q);
include("./includes/header.inc.php");
?>
<div id="header-wrapper">
	<div id="header">
		<div id="menu">
			<?php
			include("./includes/menu.inc.php");
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
	include("./includes/logo.inc.php");
	?>
</div>
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<hr />
			<!-- end #logo -->
			<div id="content">
				<div class="post">

					<h2 class="title">
						<centre class="text-info">Verify</centre></a>
					</h2>
					<p class="meta"></p>
					<div class="entry">
						<table border="0" width="100%" class="table">
							<tr>
								<td><b>No</b></td>
								<td><b>Job Title</b></td>
								<td><b>Category</b></td>
								<td><b>Accept</b></td>
							</tr>
							<?php
							$count = 1;
							while ($row = mysqli_fetch_array($res)) {
								echo '<tr >
										<td>' . $count . '</td>
										<td> ' . $row['j_title'] . '</td>
										<td>' . $row['j_category'] . '</td>
										<td><a href="process_verify.php?id=' . $row['j_id'] . '" class="btn btn-sm btn-info px-3 py-0">Verify</a></td>
									</tr>';
								$count++;
							}

							?>
						</table>
					</div>
				</div>

			</div>
			<!-- end #content -->
			<div id="sidebar">

				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
