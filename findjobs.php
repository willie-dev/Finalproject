<?php session_start();
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
include("includes/header.inc.php");
?>
<div id="header-wrapper">
	<div id="header">
		<div id="menu" class="pt-5">
			<?php
			if (isset($_SESSION['msg-danger'])) {
				echo $_SESSION['msg-danger'];
				session_unset();
			}
			?>
		</div>
	</div>
</div>
<div id="wrapper">
	<div id="page" class="py-5">
		<ol>
			<?php
			if (!empty($_GET["search"])) {
				$search = $_GET["search"];
				$query = "SELECT j_title,j_id FROM jobs WHERE j_category LIKE '%$search%' || j_title LIKE '%$search%'";
				$res = $link->query($query) or die("wrong query" . $link->error);
				// $row = mysqli_fetch_assoc($res);
				$row_num = mysqli_num_rows($res);
				if ($row_num != 0) {
					while ($row = mysqli_fetch_array($res)) {
						$d = $row['j_id'];
						echo '<li class="h4">
				 					<a href="details.php?j_id=' . $d . '">' . $row['j_title'] . '</a>
				 					</li>';
					}
				} else {
					// header("location:index.php");
					$_SESSION['msg-danger'] = "
				 				<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
				 							<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>No job matches your search.</div>";
				}
			}

			?>
		</ol>
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