<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($servername, $username, $password,$dbname); //Creates connection to the database server (Procedural way)

if (!$conn) {
    /*die("Connection failed: " . mysqli_connect_error());*/
    header('Location:error.php'); //redirect to this page in case of error
    exit;
}


$rollno = $_POST["rno"];
$title = $_POST["title"];
$author = $_POST["author"];
$rl1 = $_POST["rl1"];
$rl2 = $_POST["rl2"];

$query="INSERT into suggestions values ('$rollno','$title','$author','$rl1','$rl2')";
$result=mysqli_query($conn, $query);
//header("Location:thankyou.php");

if($result)
{
    echo "Done";
}

else
{
    echo "Not done";
}

?>