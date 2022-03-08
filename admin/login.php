<?php session_start();
include("includes/header.inc.php");
?>
<div id="header-wrapper">
    <div id="header">
        <div id="menu">
            <?php
            if (isset($_SESSION['msg-danger'])) {
                echo $_SESSION['msg-danger'];
                session_unset();
            }
            ?>
        </div>
    </div>
</div>
<div id="wrapper">
    <div id="page">
        <div class="card shadow mx-auto col-md-6 pt-2 pb-4">
            <h1 class="font-weight-bold py-4 border-bottom border-primary text-center mb-5">Admin Login Page </h1>
            <form action="process_login.php" method="post" class="px-3">
                <div class="form-group">
                    <label for="name" class="h4">Username</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="pwd" class="h4">Password</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Type your password">
                </div>
                <div class="form-group offset-lg-8 py-3 mb-5">
                    <button type="submit" name="login" class="btn btn-sm px-3 d-block clearfix float-right bg-info text-light font-weight-bold">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="mb-5" style="clear: both;">&nbsp;</div>
<!-- end #page -->
<div id="footer">
    <?php
    include("includes/footer.inc.php");
    ?>
</div>
<!-- end #footer -->