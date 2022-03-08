<?php session_start();
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can't connect");
if (isset($_REQUEST['editEmployee'])) {
    $id = $_SESSION['id'];
    $fnm = $_POST['fnm'];
    $lnm = $_POST['lnm'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $phno = $_POST['phno'];
    $cl = $_POST['cl'];
    $quali = $_POST['quali'];
    $pwd = $_POST['pwd_new'];
    move_uploaded_file($_FILES['resume']['tmp_name'], "uploads/" . $_FILES['resume']['name']);
    $path = "uploads/" . $_FILES['resume']['name'];
    $query = "UPDATE employees SET ee_fnm='$fnm', ee_lnm='{$lnm}', ee_email='$email', ee_pwd='$pwd',ee_resume='$path',ee_addr='$addr',ee_phno='$phno',ee_current_location='$cl',ee_qualification='$quali' WHERE ee_id='$id'";
    $res = $link->query($query) or die("wrong query" . $link->error);
    if ($res) {
        $msg[] = "Record has been updated...successfully!";
        $_SESSION['msg-type']  = "success";
        $sql = "select * from employees where ee_id = '$id'";
        $res = $link->query($sql) or die("wrong query" . $link->error);
        $data = mysqli_fetch_assoc($res);
        $_SESSION['fnm'] = $data['ee_fnm'];
        $_SESSION['lnm'] = $data['ee_lnm'];
    } else {
        $msg[] = "Failed to updated record...try again!";
        $_SESSION['msg-type'] = "danger";
    }
    mysqli_close($link);
}
if (isset($_REQUEST['editEmployer'])) {
    $id = $_SESSION['id'];
    $fnm = $link->real_escape_string($_POST['fnm']);
    $lnm = $link->real_escape_string($_POST['lnm']);
    $cnm = $_POST['cnm'];
    $addr = $_POST['addr'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $profile = $_POST['profile'];
    $pwd = $_POST['pwd_new'];
    $query = "UPDATE employers SET er_fnm='{$fnm}', er_lnm='{$lnm}', er_pwd='{$pwd}', er_email='$email', er_pwd='$pwd',er_company_profile='$profile',er_addr='$addr',er_phno='$phno' WHERE er_id='$id'";
    $result = $link->query($query) or die("wrong query" . $link->error);
    if ($result) {
        $msg[] = "Record has been updated...successfully!";
        $_SESSION['msg-type']  = "success";
        $sql = "select * from employers where er_id = '$id'";
        $res = $link->query($sql) or die("wrong query" . $link->error);
        $data = mysqli_fetch_assoc($res);
        $_SESSION['fnm'] = $data['er_fnm'];
        $_SESSION['lnm'] = $data['er_lnm'];
    } else {
        $msg[] = "Failed to update record...try again!" . $link->error;
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
            header("location:index.php");
        }
    }
}
