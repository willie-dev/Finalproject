<?php session_start();
if(!(isset($_SESSION['admin'])))
{
	header("location:../index.php");
}
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
$q="delete from employers where er_id='".$_GET['user']."'";
$link->query($q) or die ("wrong query");
mysqli_close($link);
header("location:modifier.php");
?>
