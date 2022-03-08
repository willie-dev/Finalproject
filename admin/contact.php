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
			<div class="post">
				<h1 class="title">Recent Contact</h1>
				<p class="byline"><small></small></p>

				<div class="entry">
					<br>
					<table border="1" width="100%" class="table">

						<tr>
							<td width="25%"><b>NAME</b>
							<td width="65%"><b>QUERY</b>
							<td width="10%"><b>DEL</b>
						</tr>



						<?php
						$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");

						$q = "select * from contact";
						$res = $link->query($q) or die("can not connect");

						while ($row = mysqli_fetch_assoc($res)) {
							echo '
						<tr>
						<td>
						' . $row['cont_fnm'] . '<br><small>' . $row['cont_email'] . '</small><br><br>
						<td>' . $row['cont_query'] . '
						<td><a href="process_delete.php?cat=' . $row['cont_id'] . '" class="btn btn-danger btn-sm px-4 py-1">Delete</a>
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