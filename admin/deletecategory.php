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
			}
			?>
		</div>
		<!-- end #menu -->
		<div id="search">
			<?php
			include("../search.inc.php");
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
					<h2 class="title text-light">Delete category</h2>
						<p class="meta"></p>

						<div class="entry text-white">
							<div class="card rounded-0 mb-3">
								<h3 class="text-info text-center px-2 py-1">
									<b> All Job Categories</b>
								</h3>
							</div>





							<table class="table  table-hover" width="100%">

								<tr class="pb-4">

									<td width="20%">No.</td>
									<td width="50%">Job Category</td>
									<td width="30%">Remove Category</td>

								</tr>
								<tr rowspan="1"></tr>
								<tr>
									<?php
									$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
									$q="select * from categories";
									$res= $link->query($q) or die('wrong query');
									$count = 1;
									while ($row = mysqli_fetch_array($res)) {
										echo '<tr> <td width="10%">' . $count . '
									<td width="50%"><a href="category.php?id=' . $row['cat_id'] . '">' . $row['cat_nm'] . '
									<td><a class="btn btn-sm btn-danger py-0 px-3 ml-4" href="process_deletecategories.php?id=' . $row['cat_id'] . '">delete</a></td></tr>';

										$count++;
									}

									?>
								<tr></tr>
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
