<?php
$name = $_POST['Name'];
$genre = $_POST['Genre'];
$duration = $_POST['Duration'];
$ratings = $_POST['Ratings'];
$image = $_POST['Image'];
$video = $_POST['Video'];
$con = mysqli_connect('localhost','Username','Password','dbname') or die('Unable to connect');
if(mysqli_query($con,"INSERT INTO web_series VALUES ('$name','$genre','$duration','$ratings','$image','$video');"))
{
    echo("<p style='color:green;'> Successfully added to all users</p>");
}
else
{
    echo("<p style='color:red;'> Unsuccessful due to technical issues</p>");
}
?>
