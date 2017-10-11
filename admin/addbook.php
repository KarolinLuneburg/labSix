<?php
include("../config.php");
$title = "Add new book";
include("admin_header.php");
?>

<?php
if (isset($_POST['newbooktitle'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newbooktitle = trim($_POST['newbooktitle']);
    $newbookisbn = trim($_POST['newbookisbn']);
    $newbookauthor = trim($_POST['newbookauthor']);

    if (!$newbooktitle || !$newbookauthor || !$newbookisbn) {
        printf("You must specify both a title and an author");
        printf("<br><a href=admin.php>Return to home page </a>");
        exit();
    }

    $newbooktitle = addslashes($newbooktitle);
    $newbookisbn = addslashes($newbookisbn);
    $newbookauthor = addslashes($newbookauthor);

    # Open the database using the "admin" account
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=admin.php>Return to home page </a>");
        exit();
    }

    // Prepare an insert statement and execute it
    $stmt = $db->prepare("INSERT into Book values (?, ?, '', '', '', '', ?, '')");
    $stmt->bind_param( 'sss', $newbooktitle, $newbookisbn, $newbookauthor);
    $stmt->execute();
    printf("<br>Book Added!");
    printf("<br><a href=admin.php>Return to home page </a>");
    exit;
}

// Not a postback, so present the book entry form
?>

<h3>Add a new book</h3>
<hr>
You must enter both a title and an author and other stuff you have in the database....
<form action="addbook.php" method="POST">
    <table bgcolor="#bdc0ff" cellpadding="6">
        <tbody>
           
            <tr>
                <td>Title:</td>
                <td><INPUT type="text" name="newbooktitle"></td>
            </tr>
            <tr>
                <td>ISBN:</td>
                <td><INPUT type="text" name="newbookisbn"></td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><INPUT type="text" name="newbookauthor"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Add Book"></td>
            </tr>
        </tbody>
    </table>
</form>
<?php include("../footer.php"); ?>