<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/style.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
        <script src="https://use.fontawesome.com/18bf7bcf71.js"></script>
        <title>Book Library</title>
    </head>
    <body>
        <div id="pageContainer">
            <header>
                <div id="home">
                    <div class="logo">
                        <img src="img/title.png" title="Logo" alt="logo" />
                    </div>
                    <nav>
                        <ul class="navElements">
                            <li class="listElement"> 
                                <a class="<?php echo($current_page == 'index.php'|| $current_page == "" ) ? 'active' : NULL?>" href="index.php" >Home</a>
                            </li>
                            <li class="listElement"> 
                                <a href="about.php" class="<?php echo($current_page == 'about.php') ? 'active' : NULL?>">About Us</a>
                            </li>
                            <li class="listElement"> 
                                <a class="<?php echo($current_page == 'browse.php') ? 'active' : NULL?>" href="browse.php">Browse Books</a>
                            </li>
                            <li class="listElement"> 
                                <a class="<?php echo($current_page == 'mybooks.php' ||$current_page == 'reservedbooks.php') ? 'active' : NULL?>" href="reservedbooks.php">My Books</a>
                            </li>
                             <li class="listElement"> 
                                <a class="<?php echo($current_page == 'gallery.php') ? 'active' : NULL?>" href="gallery.php">Gallery</a>
                            </li>
                            <li class="listElement"> 
                                <a class="<?php echo($current_page == 'contact.php') ? 'active' : NULL?>" href="contact.php">Contact</a>
                            </li>
                             <li class="listElement"> 
                                <a class="<?php echo($current_page == 'SQLInjection.php' || $current_page == 'fileUpload.php') ? 'active' : NULL?>" href="SQLInjection.php">Login</a>
                            </li>
                        </ul>
                    </nav>
                    <a id="arrow" href="#welcome"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                    <!--<div class="headerImage">
                        <img src="img/headerImg.jpg" title="headerImage" alt="Image" />
                    </div>-->
                </div>
                </div>
            </header>