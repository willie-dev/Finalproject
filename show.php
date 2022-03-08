<?php session_start();

if (!isset($_SESSION['status'])) {
	header("location:index.php");
}
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("cant connect");
//select all fields from employees where emp-id is among the user ids in applicants table
//whose job id is equal to _GETid.
$q = "select * from employees where ee_id in(select a_uid from applicants where a_jid=" . $_GET['id'] . " )";
$res = $link->query($q) or die("wrong query");
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

					<h2 class="title"><?php echo $_GET['nm']; ?></h2>
					<p class="meta"></p>
					<div class="entry">

						<table class="table" width="100%">

							<tr>
								<b>
									<td width="5%">No.
									<td width="35%">Applicant Name
									<td width="35%">Applicant Email
									<td width="25%">Applicant Resume
								</b>
							</tr>
							<?php
							$count = 1;
							while ($row = mysqli_fetch_array($res)) {
								echo '<tr> <td width="5%">' . $count . '
								<td width="35%">' . $row['ee_fnm'] . ' ' . $row['ee_lnm'] . '
								<td width="35%">' . $row['ee_email'] . '
								<td width="25%"><a class="btn btn-sm px-2 py-0 text-light btn-info" href="' . $row['ee_resume'] . '">Read Resume</a>
								';
								$count++;
							}
							?>
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
