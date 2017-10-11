<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:admin.php");
    //header("location:../index.php");
}
?>
<?php 
include("../config.php"); 
?>

<?php if(isset($_POST) && !empty($_POST)) : ?>

<?php 
	$myusername =  stripslashes($_POST['username']);
	$mypassword =  stripslashes($_POST['userpass']);
    //$myusername =  stripslashes($_POST['myusername']);
	//$mypassword =  stripslashes($_POST['mypassword']);
	
	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		exit();
	}

    $stmt = $db->prepare("SELECT username, userpass FROM TestingUser WHERE username = ?");
	//$stmt = $db->prepare("SELECT username, password FROM librarians WHERE username = ?");
	$stmt->bind_param('s', $myusername);
	$stmt->execute();
	
    $stmt->bind_result($username, $password);


    while ($stmt->fetch()) {
        if (sha1($mypassword) == $password)
		{
			$_SESSION['username'] = $myusername;
			echo $_SESSION['username'];
            //header("location:index.php");
			//exit();
		}
    }

?>

<?php endif;?>


<!--<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="main_login.php">Login</a>
</div>
<div class="container">
    <form>
        <!-- MAKE YOUR FORM HERE! -->
   <!-- </form>-->

