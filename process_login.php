<?php session_start();
if (empty($_POST)) {
	exit;
}

if (empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['cat'])) {
	$_SESSION['msg-danger'] = "<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>You must enter your credentials to proceed !</div>";
	header("location:index.php#login?error");
	exit;
}
if ($_POST['cat'] == 'employee') {
	$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
	$q = "select * from employees where ee_email = '" . $_POST['email'] . "'";
	$res = $link->query($q) or die("wrong query");
	$row = mysqli_fetch_assoc($res);

	if (!empty($row)) {
		if ($_POST['pwd'] == $row['ee_pwd']) {
			//login
			$_SESSION = array();
			$_SESSION['fnm'] = $row['ee_fnm'];
			$_SESSION['lnm'] = $row['ee_lnm'];
			$_SESSION['id'] = $row['ee_id'];
			$_SESSION['cat'] = 'employee';
			$_SESSION['status'] ="user";
			$_SESSION['employee'] = 1;
			header("location:index.php");
		} else {
			$_SESSION['msg-danger'] = "<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>User email and password do not match...Try again!</div>";
			header("location:index.php#login?error");
		}
	} else {
		$_SESSION['msg-danger'] = "<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>The user does not exist .Confirm your credential again!!</div>";
		header("location:index.php#login?error");
	}
}

if ($_POST['cat'] == 'employer') {

	$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
	$q = "select * from employers where er_email = '" . $_POST['email'] . "'";
	$res = $link->query($q) or die("wrong query");
	$row = mysqli_fetch_assoc($res);
	if (!empty($row)) {
		if ($_POST['pwd'] == $row['er_pwd']) {
			//login
			$_SESSION = array();

			$_SESSION['fnm'] = $row['er_fnm'];
			$_SESSION['lnm'] = $row['er_lnm'];
			$_SESSION['employer'] = 1;
			$_SESSION['cat'] = 'employer';
			$_SESSION['id'] = $row['er_id'];
			$_SESSION['status'] = 1;
			header("location:index.php");
		} else {
			$_SESSION['msg-danger'] = "<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>User email and password do not match...Try again!</div>";
			header("location:index.php#login?error");
		}
	} else {
		$_SESSION['msg-danger'] = "<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>The user does not exist .Confirm your credential again!!</div>";
		header("location:index.php#login?error");
	}
}
