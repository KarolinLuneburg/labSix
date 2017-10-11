<?php

include("../config.php");



//----------------------------------------Main Login--

session_start();
if (isset($_SESSION['username'])) {
    header("location:admin.php");
    //header("location:../index.php");
}
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

    $stmt = $db->prepare("SELECT username, userpass, usertype FROM TestingUser WHERE username = ?");
	//$stmt = $db->prepare("SELECT username, password FROM librarians WHERE username = ?");
	$stmt->bind_param('s', $myusername);
	$stmt->execute();
	
    $stmt->bind_result($username, $password);


    while ($stmt->fetch()) {
        if (sha1($mypassword) == $password)
		{
			$_SESSION['username'] = $myusername;
			echo $_SESSION['username'];
            header("location:admin.php");
			exit();
		}
    }

?>

<?php endif;?>
        
<!----------------------------------------Login Form-->
        

        <div class="formContainer">
            <form method="POST" action="">
                Name: <br>
                <input type="text" name="username">
                <br>
                Password: <br>
                <input type="password" name="userpass">
                <br>
                <input class="login" type="submit" value="Login">
            </form>
        </div>
    </body>
</html>

