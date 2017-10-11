<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#-- denie any scripting ------------------------------------------------------

#we can create a function to add comments
#basically it inserts a comment in a database.

function add_comment($comment){
    
    
@ $db = new mysqli('localhost', 'root', '', 'Library');


#here we add the html entities and string escaping
$comment= htmlentities($comment); 
#-- rewrites html entities -----------------------------
    
$comment = mysqli_real_escape_string($db, $comment);
#-- adds backslashes to certain characters --------------
#-- 'OR 1=1 # -> \'OR 1=1 \#
    


#<iframe style="position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;" border="0" src="http://ju.se/"  />
#try the iframe after you add the "htmlentities"

$query = ("INSERT INTO TestingUser(Comments) VALUES ('{$comment}')");
$stmt = $db->prepare($query);
$stmt->execute();
    
}


#then we create a function to pull out all comments
#it goes in the database and pulls out all comments.

function get_comment(){
    
@ $db = new mysqli('localhost', 'root', '', 'Library');
    
$query = ("SELECT Comments FROM TestingUser");
$stmt = $db->prepare($query);
$stmt->bind_result($result);
$stmt->execute();


    while ($stmt->fetch()) {
        echo $result;
        echo "<hr/>";
    
    }

}


#here we test if the POST has been submited
#if yes, we call the function 'add_comment' which will add a new comment in the DB
if (isset($_POST['comment'])) {
    add_comment($_POST['comment']);
}


#here we call all comments to be shown by simply calling the get_comment function
get_comment();

#you can also store this in a variable and use later
# $allcomment = get_comment();
?>



<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content_Type" content="text/html; charset=utf-8"
    </head>
    <body>
        <div>
            <hr/>
 
            <form action="" method ="POST">
                <p>
                    <textarea name="comment" rows="15" cold="70"></textarea>
                    <input type ="submit" name="Comment">
                </p>        
            </form>
        
    </body>
</html>
