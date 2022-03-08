<?php session_start();
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
$q = "select * from jobs where j_id =". $_GET['id'];

$res = $link->query($q) or die("Wrong Query");
$row = mysqli_fetch_assoc($res);

include("includes/header.inc.php");
?>
<div id="header-wrapper">
	<div id="header">
		<div id="menu">
			<?php
			include("includes/menu.inc.php");
			if (isset($_SESSION['msg-success'])) {
				echo $_SESSION['msg-success'];
				session_unset();
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
				<div class="post">

					<h2 class="title">
						<centre><?php echo $row['j_title']; ?></centre>
					</h2>
					<p class="meta"></p>
					<div class="entry">
						<div class="card rounded-0">
							<h3 class="text-info text-center px-2 py-1">
								<b> Job Qualifications / Details</b>
							</h3>
						</div>
						<table class="table text-light border border-info" width="100%">

							<?php

							echo '<tr><td width="30%"><b>Job Category :</b><br><td>' . $row['j_category'] . '</td></tr>
								<tr><td><b>Monthly Salary :</b></td><td>' . $row['j_salary'] . '</td></tr>
								<tr><td><b>Working Hours :</b></td><td>' . $row['j_hours'] . ' hours</td></tr>
								<tr><td><b>Experience :</b></td><td>' . $row['j_experience'] . ' years</td></tr>
								<tr><td><b>Job Location :</b></td><td>' . $row['j_city'] . '</td></tr>
								<tr><td><b>Job Description:</b></td><td>' . $row['j_discription'] . '</tr>
								';

							?>
							<br>
							<br>

							<?php

							if (isset($_SESSION['status']) && $_SESSION['cat'] == "employee") {
								echo '<tr><td colspan="2"><center><a class="btn btn-md btn-success px-2" href="process_apply.php?jid=' . $row['j_id'] . '"> Apply Now</center></td></tr></a>';
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
