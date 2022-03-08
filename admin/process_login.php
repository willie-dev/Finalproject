<?php session_start();
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$msg = array();
	if (empty($email) || empty($pwd)) {
		$msg[] = "You must fill in all the input fields before you submit";
		$_SESSION['msg-type'] = "danger";
	} else {
		$q = "select * from admin where adm_email='$email' and adm_pwd='$pwd' ";
		$result = $link->query($q) or die("wrong query");
		if ($data = mysqli_fetch_assoc($result)) {
			$_SESSION['status'] = 1;
			$_SESSION['fnm'] = $data['adm_fnm'];
			$_SESSION['lnm'] = $data['adm_lnm'];
			$_SESSION['admin'] = 1;
			$_SESSION['id'] = $data['adm_id'];
			$msg[] = "Logged in Successfully !";
			$_SESSION['msg-type'] = "success";
		} else {
			$msg[] = "Verification failed";
			$_SESSION['msg-type'] = "danger";
		}
		mysqli_close($link);
	}
	if (!empty($msg)) {
		foreach ($msg as $k) {
			$_SESSION['msg'] = $_SESSION['msg-type'];
			if ($_SESSION['msg'] == "danger") {
				$_SESSION['msg-danger'] = "
			<div class='py-3 border-danger shadow h4 alert alert-danger alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
				header("location:login.php?error");
			} elseif ($_SESSION['msg'] == "success") {
				$_SESSION['msg-success'] = "
			<div class='py-3 border-success shadow h4 alert alert-success alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
				header("location:index.php");
			} else {
				header("location: login.php");
			}
		}
	}
}
