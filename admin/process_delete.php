<?php session_start();
if(!(isset($_SESSION['admin'])))
{
	header("location:../index.php");
}
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
$q="delete from contact where cont_id='".$_GET['cat']."'";
$link->query($q) or die ("wrong query");
mysqli_close($link);
header("location:contact.php");
?>
