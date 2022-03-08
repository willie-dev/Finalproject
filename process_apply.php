<?php session_start();
if (empty($_GET)) {
	header("location:index.php");
}
$link = mysqli_connect("localhost", "root", "", "jobs4you") or die("can not connect");
$q = "insert into applicants (a_uid,a_jid)values(" . $_SESSION['id'] . "," . $_GET['jid'] . ")";

$link->query($q) or die("wrong query");
$_SESSION['msg-success'] = "
			<div class='py-3 border-success shadow h4 alert alert-success alert-dismissible''>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Application submitted successfully!....the employer will get in touch with you as soon as possible.</div>";
header("location:job_details.php?id=" . $_GET['jid']);
