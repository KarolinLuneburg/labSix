<?php 
include("config.php");
?>
<div class="browseFormContainer">
    <h2> Search for a book</h2>
            <form action="browse.php" method="POST">
                <table cellpadding="6">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                        </tr>
                        <tr>
                            <td><INPUT type="text" name="searchtitle" class="inputForm"></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                        </tr>
                        <tr>
                            <td><INPUT type="text" name="searchauthor" class="inputForm"></td>
                        </tr>
                        <tr>
                            <td><INPUT type="submit" name="submit" value="Submit" class="submit"></td>
                        </tr>
                        
                    </tbody>
                </table>
            </form>
    </div>
    <div class="listContainer">
            <h2>Book List</h2>
    
        

<?php

        
# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

        
$searchtitle = "";
$searchauthor = "";
        
if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}      
        
#XSS        
$searchtitle = htmlentities($searchtitle);
$searchauthor = htmlentities($searchauthor);
$searchtitle = mysqli_real_escape_string($db, $searchtitle);
$searchauthor = mysqli_real_escape_string($db, $searchauthor);
        
     



//	if (!$searchtitle && !$searchauthor) {
//	  echo "You must specify either a title or an author";
//	  exit();
//	}

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);


# Build the query. Users are allowed to search on title, author, or both

$query = " select ISBN, Author, Title, Reserved from Book";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " where Title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " where Author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " where Title like '%" . $searchtitle . "%' and Author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($ISBN, $Author, $Title, $Reserved);
    $stmt->execute();

    echo '<table cellpadding="15">';
    echo '<tr><b><td>Title</td> <td>Author</td><td>Reserved</td> <td>Reserve</td> </b> </tr>';
    while ($stmt->fetch()) {
        if($Reserved == 0){
            $Reserved = 'No';
        }else{
            $Reserved = 'Yes';
        }
        echo "<tr>";
        echo "<td> $ISBN </td><td> $Title </td><td> $Author </td><td> $Reserved </td>";
        echo '<td class="submit"><a href="reserveBook.php?ISBN=' . urlencode($ISBN) . '"> Reserve </a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>

</div>