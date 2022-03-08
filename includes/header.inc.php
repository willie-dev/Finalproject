<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOBS4YOU</title>
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="icon" type="image/x-icon" href="images/jobs4you-logo.png" />
    <style>
        .btn-log {
            border: 1px solid #f2f2f2;
            border-radius: 1px;
        }
    </style>
</head>

<body class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg p-4  shadow border-bottom border-info">
        <div class="container mx-auto">
            <div class="navbar-header d-flex">
                <div class="pl-3">
                    <?php
                    if (isset($_SESSION['employer']))
                        echo '<h2 class="text-light text-left">Hi <b>'.ucfirst($_SESSION['fnm']).' !</h2>';
                    else {
                        echo '<h2 class="text-light"><b>Available Jobs for You</b></h2>';
                    }
                    ?>
                </div>
                <span class="ml-auto">
                    <button class="navbar-dark navbar-toggler outline-none" type="button" data-toggle="collapse" data-target="#collapsiblenavbar" aria-controls="collapsiblenavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </span>
            </div>
            <div class="collapse navbar-collapse mx-auto" id="collapsiblenavbar">
                <ul class="navbar-nav pt-1 ml-auto">
                    <?php
                    if (isset($_SESSION['employer'])) {
                        echo '
                            <li class="nav-item px-3">
                                <a class="nav-link text-light" href="index.php">Home</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link text-light" href="register-employee.php">Register Employee</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link text-light" href="postjob.php">Post Job</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link text-light" href="manage.php">Manage Job</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link text-light" href="contact.php">Contact Us </a>
                            </li>
                           <li class="nav-item px-3">
                                <a href="process_logout.php" class="btn btn-default shadow-lg text-light btn-log py-1 my-1">Logout</a>
                            </li> ';
                    } else if (isset($_SESSION['employee'])) {
                        echo ' 
                            <li class="nav-item px-3">
                                <a class="nav-link text-light" href="index.php">Home</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link text-light" href="register-employer.php">Register As Employer </a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link text-light" href="contact.php">Contact Us </a>
                            </li>
                            <li class="nav-item px-3">
                                <a href="process_logout.php" class="btn btn-default shadow-lg text-light btn-log py-1 my-1">Logout</a>
                            </li>';
                    } else {
                        echo '
                                <li class="nav-item px-3">
                                    <a class="nav-link text-light" href="index.php">Home</a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link text-light" href="register-employee.php">Register As Jobseeker</a>
                                </li>
                                    <a class="nav-link text-light" href="register-employer.php">Register As Employer</a>
                                <li class="nav-item px-3">
                                    <a class="nav-link text-light" href="contact.php">Contact Us </a>
                                </li>
                                <li class="nav-item px-3">
                                    <a href="#login" data-toggle="modal" data-target="#login" class="btn btn-default shadow-lg text-light btn-log py-1 px-3 my-1">Login</a>
                                </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="modal fade shadow" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md" role="logins">
                <div class="modal-content border-info shadow">
                    <div class="modal-header">
                        <h3 class="modal-title" id="login"><b class="pl-4 text-info">Enter your Credentials to Login</b></h3>
                    </div>
                    <div class="modal-body p-5">
                        <form action="process_login.php" method=POST>
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your email here">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input type="password" class="form-control" name="pwd" placeholder="Type your password">
                            </div>
                            <div class="form-group">
                                <label for="type">Type/Role</label>
                                <select class="form-control" name="cat">
                                    <option> employee
                                    <option> employer
                                </select>

                            </div>
                            <div class="form-group offset-lg-8 py-3 mb-5">
                                <button type="submit" class="btn btn-sm px-3 d-block clearfix float-right bg-info text-light font-weight-bold">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>