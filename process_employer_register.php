<?php
session_start();
if (empty($_POST)) {
	exit;
}
$msg = array();
if (
	empty($_POST['fnm']) || empty($_POST['lnm']) || empty($_POST['cnm']) || empty($_POST['addr']) || empty($_POST['phno']) || empty($_POST['email']) || empty($_POST['profile']) || empty($_POST['pwd'])
) {
	$msg[] = "You must fill in all the input fields before you submit";
	$_SESSION['msg-type'] = "danger";
} else if (strlen($_POST['pwd'] < 6)) {
	$msg[] = "please enter atleast 6 digit password";
	$_SESSION['msg-type'] = "danger";
} else if (strlen($_POST['phno']) != 10) {

	$msg[] = "Please enter 10 digit phone  number";
	$_SESSION['msg-type'] = "danger";
} else {
	$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");

	$fnm = $_POST['fnm'];
	$lnm = $_POST['lnm'];
	$cnm = $_POST['cnm'];
	$addr = $_POST['addr'];
	$phno = $_POST['phno'];
	$email = $_POST['email'];
	$profile = $_POST['profile'];
	$pwd = $_POST['pwd'];


	$q = "insert into employers(er_fnm,er_lnm,er_pwd,er_company,er_add,er_ph,er_email,er_company_profile)
		   values ('$fnm','$lnm','$pwd','$cnm','$addr','$phno','$email','$profile')";

	$link->query($q) or die("wrong query");
	mysqli_close($link);
	$msg[] = "Employer Registered Successfully !";
	$_SESSION['msg-type'] = "success";
}
if (!empty($msg)) {
	foreach ($msg as $k) {
		$_SESSION['msg'] = $_SESSION['msg-type'];
		if ($_SESSION['msg'] == "danger") {
			$_SESSION['msg-danger'] = "
			<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
			header("location:register-employer.php?error");
		} elseif ($_SESSION['msg'] == "success") {
			$_SESSION['msg-success'] = "
			<div class='py-3 border-success shadow h4 alert alert-success alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
			header("location:register-employer.php?success");
		} else {
			header("location:register-employer.php");
		}
	}
}
