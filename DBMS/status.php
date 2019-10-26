<?php
$usr = $_POST['username'];
$pass = $_POST['password'];
if ($usr == NULL or $pass == NULL)
{
    echo('<p style="color:red;">There is some problem</p>');

}
else
{
    $con = mysqli_connect("localhost","Pranav","Passwd@123","dbms") or die('Unable to connect to database');
    $stat = mysqli_query($con,"INSERT INTO users VALUES('$usr','$pass');");
    if($stat == 1)
    {
        echo('<p style="color:green;">Succesfully registered</p>');
    }
    else
    {
        echo('<p style="color:red;">There is some problem</p>');
    }
}

?>