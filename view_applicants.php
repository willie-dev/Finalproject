<?php session_start();
if (!(isset($_SESSION['status']))) {
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

			include("includes/search.inc.php");
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
      <?php
            $query = "SELECT employees.ee_fnm,jobs.j_title from jobs
                              INNER JOIN applicants on applicants.a_jid = jobs.j_id
                              INNER JOIN employees on employees.ee_id = applicants.a_uid
                              INNER join employers on employers.er_fnm = ".$_SESSION['admin'];
            // $link->query()

       ?>
			<div class="post">
				<h1 class="title text-info">Job applicants</h1>
				<p class="byline"><small></small></p>

				<div class="entry">
					<br>
					<table border="1" width="100%" class="table">

						<tr>
							<td width="25%"><b>Email</b>
							<td width="65%"><b>Name</b>
							<td width="10%"><b>Job title</b>
						</tr>



						<?php
						$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
						$q = "SELECT employees.ee_fnm as emp_name,employees.ee_email as emp_email,jobs.j_title as title from jobs
                              INNER JOIN applicants on applicants.a_jid = jobs.j_id
                              INNER JOIN employees on employees.ee_id = applicants.a_uid
                              INNER join employers on employers.er_fnm = '".$_SESSION['admin']."'";
						$res = $link->query($q) or die("can not connect".$link->error);

						while ($row = mysqli_fetch_assoc($res)) {
							echo '
						<tr>
						<td>
						' . $row['emp_email'] . '<br><small>' . $row['emp_name'] . '</small><br><br>
						<td>' . $row['emp_name'] . '
						<td>'.$row['title'].'
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
