

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="../css/style.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
        <script src="https://use.fontawesome.com/18bf7bcf71.js"></script>
        <title>Book Library</title>
    </head>
    <body>
        <div id="pageContainer">
            <header>
                <div id="home">
                    <div class="logo">
                        <img src="../img/title.png" title="Logo" alt="logo" />
                    </div>
                    <nav>
                        <ul class="navElements">
                           <li class="listElement"> 
                                <a class="<?php echo($current_page == '../index.php') ? 'active' : NULL?>" href="../index.php" >User View</a>
                            </li>
                            <li class="listElement"> 
                                <a class="<?php echo($current_page == 'admin.php' || $current_page == "") ? 'active' : NULL?>" href="admin.php" >Admin</a>
                            </li>
                            <li class="listElement"> 
                                <a href="addbook.php" class="<?php echo($current_page == 'addbook.php') ? 'active' : NULL?>">Add Book</a>
                            </li>
                            <li class="listElement"> 
                                <a class="<?php echo($current_page == 'booklistdelete.php') ? 'active' : NULL?>" href="booklistdelete.php">Delete Book</a>
                            </li>
                            <li class="listElement"> 
                                <a class="<?php echo($current_page == 'upload_admin.php') ? 'active' : NULL?>" href="admin_upload.php">Upload Image</a>
                            </li>
                            
                            <li class="listElement"> 
                                <a class="<?php echo($current_page == 'logout.php') ? 'active' : NULL?>" href="logout.php">Logout</a>
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