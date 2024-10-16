<?php
include_once('adm/db-connection.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="assets/img/favicon.png">

    <!-- Title -->
    <title> NoonPost. - Personal Blog HTML Template </title>

    <!--Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom_toastr.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .error-message {
            color: red;
            font-weight: 500;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <!--loading -->
    <!-- <div class="loading">
        <div class="loading__circle"></div>
    </div> -->
    <!--/-->

    <!-- Header -->
    <header class="header fixed-top navbar-expand-xl">
        <div class="container-fluid">
            <div class="header__main">
                <!-- logo -->
                <div class="logo">
                    <a class="logo__link logo--dark" href="index.php">
                        <img src="assets/img/logo/logo-dark.png" alt="" class="logo__img">
                    </a>
                    <a class="logo__link logo--light" href="index.php">
                        <img src="assets/img/logo/logo-white.png" alt="" class="logo__img">
                    </a>
                </div><!--/-->

                <div class="header__navbar">
                    <nav class="navbar">
                        <!--navbar-collapse-->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ">
                                <!--Homes -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>

                                <!--Posts features -->
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " href="javascript:void(0)" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Post features</a>
                                    <ul class="dropdown-menu ">
                                        <li><a class="dropdown-item " href="post-default.php">post default </a></li>
                                        <li><a class="dropdown-item" href="post-left-sidebar.php">post left sidebar </a></li>
                                        <li><a class="dropdown-item" href="post-no-sidebar.php">post no sidebar</a></li>
                                        <li><a class="dropdown-item" href="post-video.php">post video </a></li>
                                        <li><a class="dropdown-item" href="post-audio.php">post audio </a></li>
                                        <li><a class="dropdown-item" href="post-gallery.php">post gallery </a></li>
                                    </ul>
                                </li> -->

                                <!--Blogs-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="blog.php"> blogs </a>
                                </li>

                                <!--Pages-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="about.php"> About Us </a>
                                </li>

                                <!--contact -->
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php"> contact </a>
                                </li>
                            </ul>
                        </div>
                        <!--/-->
                    </nav>
                </div>

                <!-- header actions -->
                <!-- <div class=" header__action-items"> -->
                <!--header-social-->
                <!-- <ul class="list-inline social-media social-media--layout-one">
                        <li class="social-media__item">
                            <a href="#" class="social-media__link">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </li>
                        <li class="social-media__item">
                            <a href="#" class="social-media__link">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </li>
                        <li class="social-media__item">
                            <a href="#" class="social-media__link"><i class="bi bi-twitter-x"></i></a>
                        </li>
                        <li class="social-media__item">
                            <a href="#" class="social-media__link"><i class="bi bi-youtube"></i></a>
                        </li>
                    </ul> -->

                <!--theme-switch-->
                <!-- <div class="theme-switch">
                        <label class="theme-switch__label" for="checkbox">
                            <input type="checkbox" id="checkbox" class="theme-switch__checkbox">
                            <span class="theme-switch__slider round ">
                                <i class="bi bi-sun icon-light theme-switch__icon theme-switch__icon--light"></i>
                                <i class="bi bi-moon icon-dark theme-switch__icon theme-switch__icon--dark"></i>
                            </span>
                        </label>
                    </div> -->

                <!--search-icon-->
                <!-- <div class="search-icon">
                    <a href="#search" class="search-icon__link">
                        <i class="bi bi-search search-icon__icon"></i>
                    </a>
                </div> 
                class="search__form"
                class="search__form-input"
                class="search__form-btn-search"-->

                <form action="search.php" class="searchform" method="GET">
                    <input type="search" required name="search_blog" value="" placeholder="Search blog...">
                    <button type="submit" name="search">search</button>
                </form>

                <!--navbar-toggler-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler__icon"></span>
                </button>
            </div>
        </div>
        </div>
    </header>