<?php
include("../config.php");
$title = "Delete book";
include("admin_header.php");
?>

<?php
if (isset($_GET['submit'])) {
    // We know the borrower so go ahead and check the book out
    # Get data from form
    $bookid = trim($_GET['bookid']);      // From the hidden field
    $bookid = addslashes($bookid);

    # Open the database using the "librarian" account
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an update statement and execute it
    
        $stmt = $db->prepare("delete from Book where ISBN = ?");
        $stmt->bind_param('s', $bookid);
        $response = $stmt->execute();
        printf("<br>Book deleted!");
        printf("<br><a href=admin.php>Return to home page </a>");
    
    
    exit;
}

// We don't have a borrower id yet so present a form to get one,
// then post back using a hidden field to pass through the bookid
// which came from the hand-crafted URL query string on the book
// search page
?>

<h3>Delete book</h3>
<hr>
<form action="deletebook.php" method="GET">
    Are you sure you want to delete book?
    <?php
    $bookid = trim($_GET['ISBN']);
    echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';
    ?>
    <INPUT type="submit" name="submit" value="Continue">
</form>
<?php include("../footer.php"); ?>