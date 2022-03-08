<?php
if (empty($_GET)) {
	header("location:index.php");
}

$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
$q = "update jobs
			set j_active=1
			where j_id=" . $_GET['id'];
$link->query($q);

header("location:verify.php");
?>
