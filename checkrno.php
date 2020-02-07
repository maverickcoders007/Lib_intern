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


$rollno = $_GET["rno"];

$query="SELECT * from student where rollno='$rollno'";
$result=mysqli_query($conn, $query);
//header("Location:thankyou.php");

if(mysqli_num_rows($result)==0)
{
    echo "Invalid Roll number!";
}

?>