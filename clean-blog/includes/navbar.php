<?php

session_start();
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blogger</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="http://localhost/CMS_Web_Project-V1/clean-blog/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="http://localhost/CMS_Web_Project-V1/clean-blog/index.php">Blogger</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/CMS_Web_Project-V1/clean-blog/index.php">Home</a></li>

                        <?php if(isset($_SESSION['username'])) : ?>
                        
                       
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/CMS_Web_Project-V1/clean-blog/posts/create.php">Create</a></li>
                        <li class="nav-item dropdown mt-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION ['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="">Profile</a></li>
                            <li><a class="dropdown-item" href="./auth/logout.php">Logout</a></li>
                           
                        </ul>
                        </li> 

                        <?php else : ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/CMS_Web_Project-V1/clean-blog/auth/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/CMS_Web_Project-V1/clean-blog/auth/register.php">Register</a></li>
                        <?php endif; ?>
                      
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>