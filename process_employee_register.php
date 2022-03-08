<?php session_start();
if (empty($_POST)) {
	exit;
}
$msg = array();
if (
	empty($_POST['fnm']) || empty($_POST['lnm']) || empty($_POST['email']) || empty($_POST['addr']) || empty($_POST['phno']) || empty($_POST['cl']) || empty($_POST['quali']) || empty($_POST['pwd'])
) {
	$msg[] = "You must fill in all the input fields before you submit";
	$_SESSION['msg-type'] = "danger";
} else if (strlen($_POST['pwd']) < 6) {
	$msg[] = "Please enter atlist 6 digit password";
	$_SESSION['msg-type'] = "danger";
} else if (strlen($_POST['phno']) != 10) {
	$msg[] = "Please enter 10 digit phone number";
	$_SESSION['msg-type'] = "danger";
} else if (empty($_FILES['resume']['name'])) {
	$msg[] = "Please select a file";
	$_SESSION['msg-type'] = "danger";
} else if ($_FILES['resume']['error'] > 0) {
	$msg[] = "Error uploading file";
	$_SESSION['msg-type'] = "danger";
} else if (file_exists("uploads/" . $_FILES['resume']['name'])) {
	$msg[] = "This file is already uploaded.";
	$_SESSION['msg-type'] = "danger";
} else if (!(strtoupper(substr($_FILES['resume']['name'], -4)) == '.DOC')) {
	$msg[] = "wrong file type";
	$_SESSION['msg-type'] = "danger";
} else {
	$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");

	$fnm = $_POST['fnm'];
	$lnm = $_POST['lnm'];
	$email = $_POST['email'];
	$addr = $_POST['addr'];
	$phno = $_POST['phno'];
	$cl = $_POST['cl'];
	$quali = $_POST['quali'];
	$pwd = $_POST['pwd'];
	move_uploaded_file($_FILES['resume']['tmp_name'], "uploads/" . $_FILES['resume']['name']);
	$path = "uploads/" . $_FILES['resume']['name'];
	$q = "insert into employees(ee_resume,ee_pwd,ee_fnm,ee_lnm,ee_email,ee_addr,ee_phno,
		     ee_current_location,ee_qualification)
	    values ('$path','$pwd','$fnm','$lnm','$email','$addr','$phno','$cl','$quali')";

	$link->query($q) or die("wrong query");
	mysqli_close($link);
	$msg[] = "Employee Registered Successfully !";
	$_SESSION['msg-type'] = "success";
}
if (!empty($msg)) {
	foreach ($msg as $k) {
		$_SESSION['msg'] = $_SESSION['msg-type'];
		if ($_SESSION['msg'] == "danger") {
			$_SESSION['msg-danger'] = "
			<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
			header("location:register-employee.php?error");
		} elseif ($_SESSION['msg'] == "success") {
			$_SESSION['msg-success'] = "
			<div class='py-3 border-success shadow h4 alert alert-success alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
			header("location:register-employee.php?success");
		} else {
			header("location:register-employee.php");
		}
	}
}
