<html>
<style>
    div
    {
        float: left;
    }
</style>
<body style="background-image:url('1367.jpg');background-position:center;">
    <h1 style="color:red;textalign:center;">PBFLIX</h1>
    <span style='float:right;'><a href='http://localhost/DBMS/login.html'><img src='exit.png' height=70px width=100px /></a></span>
<?php
//session_start();
//include('header.php');
function stars($r)
{
    $a = "&#9733;";
    $out = "";
    $i = 1;
    while($i <= $r)
    {
        $out = $out.$a;
        $i = $i + 1;
    }
    //echo("<span style='color:yellow;'>$out</span>");
    return $out;

}
$uname = $_POST['username'];
$pass = $_POST['password'];
$con = mysqli_connect("localhost","Pranav","Passwd@123","dbms") or die("Unable to connect");
$query = mysqli_query($con,"SELECT count(*) FROM users where username='$uname' and password=md5('$pass');");
$result = mysqli_fetch_array($query);
$query1 = mysqli_query($con,"Select * FROM web_series;");
if($result['count(*)'] == "1")
{
    echo "<p style='color:red;'>Welcome $uname </p><br /><br />";
    if($uname == 'admin')
    {
        echo("<div style='background-color:rgb(159, 159, 163);'>");
        echo("<fieldset border=8>");
        echo("<h3 align='center' style='color:red;'>Add Video</h3>");
        //echo("<div style='background-color:white;'>");
        echo("<form action='add.php' method='POST'>");
        echo("  <p style='color:blue;'>Name:</p> <input name='Name' placeholder='Name' /><br />");
        echo("  <p style='color:blue;'>Genre:</p> <input name='Genre' placeholder='Genre'/><br />");
        echo("  <p style='color:blue;'>Duration:</p> <input name='Duration' placeholder='Duration'/><br />");
        echo("  <p style='color:blue;'>Ratings:</p> <input name='Ratings' placeholder='Ratings'/><br />");
        echo("  <p style='color:blue;'>Image Path:</p> <input type='file' name='Image' placeholder='Image Path'/><br />");
        echo("  <p style='color:blue;'>Video Path:</p> <input type='file' name='Video' placeholder='Video Path'/><br /><br />");
        echo("<input type='submit' value='Add video'/><br />");
        //echo("</div>");
        echo("</fieldset>");
        echo("</div>");

    }
    echo("<h2 style='color:Red;'>Web Series</h2>");
    while($row = mysqli_fetch_array($query1))
    {
        echo("<div><a href= 'http://localhost/DBMS/player.php?q=".$row['Video']."'><figure><img src=".$row['Image']." height = 120px width= 180px><figcaption style='color:red;'>Name: <span style='color:yellow;'>".$row['Name']."</span><br /> Genre: <span style='color:yellow;'>".$row['Genre']."</span><br />Rating: <span style='color:yellow;'>".stars(intval($row['Ratings']))."</span><br />Uploaded On: <span style='color:yellow;'>".$row['Uploaded_on']."</span></figcaption></figure></a></div>");
    }
    echo("<br />");
}
else
{
    echo("Invalid credentials");
}
?>
</body>
</html>