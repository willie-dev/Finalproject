<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOBS4YOU</title>
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
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
                <div class=" pl-2">
                    <?php
                    if (isset($_SESSION['status']))
                        echo '<h2 class="text-light text-left"><a href="index.php"><b>Hi ' . $_SESSION['fnm'] . ' !</a></h2>';
                    else {
                        echo '<h2 class="text-light"><b>ADMIN LOGIN PAGE</b></h2>';
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
                    if (isset($_SESSION['admin'])) {
                        echo '
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="addcategory.php">Add Job Category</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="verify.php">Verify Posted Jobs</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="deletecategory.php">Remove Job Category</a>
                    </li>
                     <li class="nav-item px-3">
                        <a class="nav-link text-light" href="modifier.php">Remove Users</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="contact.php">Contact Us </a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="process_logout.php" class="btn btn-default shadow-lg text-light btn-log py-1 my-1">Logout</a>
                    </li> ';
                    } else {
                        echo '<li class="nav-item px-3">
                        <a class="nav-link text-light" href="index.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light" href="contact.php">Contact Us </a>
                    </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>