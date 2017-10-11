<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();
if (!isset($_SESSION['username'])) {
    header("main_login.php");
}
?>

<?php 
include("admin_header.php");
?>

<div class="welcome">Welcome to the admin space</div>


<?php 



?>
<?php 
include("../footer.php");
?>