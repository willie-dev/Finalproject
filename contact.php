<?php session_start();
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
				<div class="col-12">
					<div class="card rounded shadow p-4">
						<h2 class="title">Contact</h2>
						<p class="meta">please fill this form if you have any query</p>
						<form action="process_contact.php" method="post">
							<div class="form-group">
								<label for="name">Your Name</label>
								<input type="text" class="form-control" required name="nm" placeholder="Enter your username">
							</div>
							<div class="form-group">
								<label for="email">Your Email</label>
								<input type="email" class="form-control" name="email" placeholder="Enter your email" required>
							</div>
							<div class="form-group">
								<label for="type">Query</label>
								<textarea class="form-control" name="query"></textarea>
							</div>
							<div class="form-group offset-lg-8 py-3 mb-5">
								<button type="submit" class="btn btn-sm rounded-sm d-block clearfix float-right bg-info text-light font-weight-bold">Submit</button>
							</div>
						</form>
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
