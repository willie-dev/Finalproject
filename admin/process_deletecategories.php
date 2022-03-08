<?php session_start();
if(!(isset($_SESSION['admin'])))
{
	header("location:../index.php");
}

if(empty($_GET))
{
	exit;
}
$msg=array();

if(empty($_GET['id']))
{
	$msg[]="One of the field is empty";
}

if(!empty($msg))
{
	echo "<b>Errors:</b><br>";
	foreach($msg as $k)
	{
		echo "<li>".$k;
	}
}
else
{
	$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
$id=$_GET['id'];
$q="delete from categories where cat_id='$id'";
	$link->query($q) or die ("wrong query");
mysqli_close($link);
header("location:deletecategory.php");
}
