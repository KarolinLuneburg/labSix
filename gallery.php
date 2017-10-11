<?php 
include ("config.php");
include ("header.php");


//code taken from: https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them

$dirname = "uploadedfiles"; //dir = directory name
$images = scandir($dirname); // scandir sorts it in order
$ignore = Array(".", ".."); // ignores . and .. in the array
foreach($images as $curimg){
//if(!in_array($curimg, $ignore)) {
    echo "<img class='galleryImg' src='uploadedfiles/$curimg' /><br>\n";
//};
}



?>



<?php 
include ("footer.php");
?>