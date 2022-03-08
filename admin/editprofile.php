<?php session_start();
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can't connect");
if (isset($_REQUEST['editAdmin'])) {
    $id = $_SESSION['id'];
    $fnm = $_POST['fnm'];
    $lnm = $_POST['lnm'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $pwd = $_POST['pwd_new'];
    $query = "UPDATE admin SET adm_fnm='$fnm', adm_lnm='$lnm', adm_email='$email', adm_pwd='$pwd',adm_phno='$phno' WHERE adm_id='$id'";
    $res = $link->query($query) or die("wrong query" . $link->error);
    if ($res) {
        $msg[] = "Record has been updated...successfully!";
        $_SESSION['msg-type']  = "success";
        $sql = "select * from admin where adm_id = '$id'";
        $res = $link->query($sql) or die("wrong query" . $link->error);
        $data = mysqli_fetch_assoc($res);
        $_SESSION['fnm'] = $data['adm_fnm'];
        $_SESSION['lnm'] = $data['adm_lnm'];
    } else {
        $msg[] = "Failed to updated record...try again!";
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
            header("location:index.php");
        } elseif ($_SESSION['msg'] == "success") {
            $_SESSION['msg-success'] = "
			<div class='py-3 border-success shadow h4 alert alert-success alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$k!</div>";
            header("location:index.php");
        } else {
            return 0;
        }
    }
}
