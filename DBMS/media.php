<html>

<body bgcolor="black">
    <h1 style="color:red;textalign:center;">PBFLIX</h1>
<?php
$uname = $_POST['username'];
$pass = $_POST['password'];
$con = mysqli_connect("localhost","Username","Password","dbname") or die("Unable to connect");
$query = mysqli_query($con,"SELECT count(*) FROM users where username='$uname' and password='$pass';");
$result = mysqli_fetch_array($query);
$query1 = mysqli_query($con,"Select * FROM web_series;");
if($result['count(*)'] == "1")
{
    echo "<p style='color:red;'>Welcome $uname </p><br /><br />";
    if($uname == 'admin')
    {
        echo("<fieldset>");
        echo("<form action='add.php' method='POST'>");
        echo("  <p style='color:blue;'>Name:</p> <input name='Name' placeholder='Name' /><br />");
        echo("  <p style='color:blue;'>Genre:</p> <input name='Genre' placeholder='Genre'/><br />");
        echo("  <p style='color:blue;'>Duration:</p> <input name='Duration' placeholder='Duration'/><br />");
        echo("  <p style='color:blue;'>Ratings:</p> <input name='Ratings' placeholder='Ratings'/><br />");
        echo("  <p style='color:blue;'>Image Path:</p> <input name='Image' placeholder='Image Path'/><br />");
        echo("  <p style='color:blue;'>Video Path:</p> <input name='Video' placeholder='Video Path'/><br />");
        echo("<input type='submit' value='Add video'/><br />");
        echo("</fieldset>");

    }
    while($row = mysqli_fetch_array($query1))
    {
        echo("<a href= 'http://localhost/DBMS/player.php?q=".$row['Video']."'><figure><img src=".$row['Image']." height = 120px width= 180px><figcaption >Name: ".$row['Name'].", Genre: ".$row['Genre'].", Rating: ".$row['Ratings']."</figcaption></figure></a>");
    }
}
else
{
    echo("Invalid credentials");
}
?>
</body>
</html>
