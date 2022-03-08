<?php session_start();
if(!(isset($_SESSION['admin'])))
{
	header("location:../index.php");
}
if(empty($_POST))
{
	exit;
}
$msg=array();

if(empty($_POST['nm']))
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
	$nm=$_POST['nm'];
	$q="insert into categories(cat_nm)values('$nm')";
	$link->query($q) or die("wrong query");
	mysqli_close($link);
	header("location:addcategory.php");
}
