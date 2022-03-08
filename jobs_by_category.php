<?php session_start();
include("includes/header.inc.php");
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can't connect");

$q = "select * from jobs where j_category ='" . $_GET['cat'] . "' and j_active=1";

$res = $link->query($q) or die("Wrong Query");
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
					<h2 class="title"><?php echo $_GET['cat']; ?></h2>
					<!-- <p class="meta"></p> -->
					<div class="pt-4">
						<ol>
							<?php
							while ($row = mysqli_fetch_assoc($res)) {
								echo '
										<li class="h4"><a class="text-info" href="job_details.php?id=' . $row['j_id'] . '">' . $row['j_title'] . '</a></li>';
							}
							?>
						</ol>
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
</div>
<div class="mb-5" style="clear: both;">&nbsp;</div>
<!-- end #page -->
<div id="footer-bgcontent">
	<div id="footer">
		<?php
		include("includes/footer.inc.php");
		?>
	</div>
</div>
<!-- end #footer -->
