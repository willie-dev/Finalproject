<?php session_start();

if (empty($_POST)) {
	exit;
}
$msg = array();
if (
	empty($_POST['title']) || empty($_POST['cat']) || empty($_POST['hours']) ||
	empty($_POST['salary']) || empty($_POST['experience']) || empty($_POST['disc']) || empty($_POST['city'])
) {
	$msg[] = "Fill in all the input fields before you submit";
	$_SESSION['msg-type'] = "danger";
} elseif (!is_numeric($_POST['salary'])) {
	$msg[] = "Only numeric values are valid";
	$_SESSION['msg-type'] = "danger";
} elseif (!is_numeric($_POST['hours'])) {
	$msg[] = "Only numeric value are valid";
	$_SESSION['msg-type'] = "danger";
} else {
	$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("cant connect");
	$title = $_POST['title'];
	$cat = $_POST['cat'];
	$hours = $_POST['hours'];
	$salary = $_POST['salary'];
	$experience = $_POST['experience'];
	$disc = $_POST['disc'];
	$city = $_POST['city'];

	$q = "insert into jobs(j_title,j_owner_name,j_category,j_hours,j_salary,j_experience,j_discription,j_city)
		   values ('$title','" . $_SESSION['fnm'] . "','$cat','$hours','$salary','$experience','$disc','$city')";

	$link->query($q) or die("wrong query");
	mysqli_close($link);
	$msg[] = "Job posted Successfully!";
	$_SESSION['msg-type'] = "success";
}

if (!empty($msg)) {
	foreach ($msg as $k) {
		$_SESSION['msg'] = $_SESSION['msg-type'];
		if ($_SESSION['msg'] == "danger") {
			$_SESSION['msg-danger'] = "
			<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
			header("location:postjob.php?error");
		} elseif ($_SESSION['msg'] == "success") {
			$_SESSION['msg-success'] = "
			<div class='py-3 border-success shadow h4 alert alert-success alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
			header("location:postjob.php");
		} else {
			header("location:postjob.php");
		}
	}
}
