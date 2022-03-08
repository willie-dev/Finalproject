<?php
if (empty($_GET)) {
	header("location:index.php");
}

$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("cant connect");

$q = "delete from jobs where j_id=" . $_GET['id'];

$link->query($q);

header("location:manage.php");
?>