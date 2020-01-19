<?php

$title=$_REQUEST["title"];
$back=$_REQUEST["back"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($servername, $username, $password,$dbname); //Creates connection to the database server

if (!$conn) {
    /*die("Connection failed: " . mysqli_connect_error());*/
    header('Location:error.php'); //redirect to this page in case of error
    exit;
}

$sql = "SELECT * FROM newarrivals WHERE title='$title'";//SQL query 1
$result = mysqli_query($conn, $sql); //resultant array getting stored in this variable

$row=mysqli_fetch_assoc($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<link href="https://fonts.googleapis.com/css?family=Barlow:300i,400,400i&display=swap" rel="stylesheet">
<title><?php echo $row["title"]; ?> - Description</title>
</head>
<style>

html
{
    height:100%;
    width:100%;
    font-size:16px;
}

body
{
    font-family: 'Barlow', sans-serif; 
    margin:0;
    cursor:default;
}
.header
{
    background-color:#2C3E50;
    z-index:50;
    display:flex;
    flex-direction: row;
    align-items: center;
    position:fixed;
    top:0;
    min-height:45px;
    height:55px;
    width:100%;
    -webkit-box-shadow: 0 4px 4px -4px #c0c0c0;
    -moz-box-shadow: 0 4px 4px -4px #c0c0c0;
    box-shadow: 0 4px 4px -4px #c0c0c0;
}

.header #titlehead
{
    color:white;
    cursor: default;
    margin:auto;
    padding-bottom:5px;
    font-size:1.5rem;
    font-style:italic;
}

.header #titlehead a,a:visited
{
    text-decoration:none;
    color:white;
}

.back
{
    position:relative;
    top:80px;
    margin-left:4.5%;
    width:20%; 
    font-size:1.2rem;
}

.desc
{
    display:flex;
    flex-direction:row;
    width:95%;
    height:500px;
    margin:auto;
    margin-top:5%;
    align-items:center;
    justify-content:center;
}

.desc #imgcontainer
{
    height:75%;
    width:250px;
}

.desc #imgcontainer #img
{
    height:100%;
    width:100%;
    object-fit:cover;
}

.desc #desccontainer
{
    margin-left:2%;
    height:75%;
    width:60%;
    border:2px solid #EBEDEF;
    border-radius:8px;
    background-color:#F8F9F9;
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    align-items:flex-start;
    font-size:1.2rem;
}

.desc #desccontainer .content
{
    padding-top:1.5%;
    padding-left:5%;
    margin-top:2%;
}

.reqbutton
{
    font-style:normal;
    width:80%;
    margin:auto;
    margin-top:10%;
    display:flex;
    justify-content:center;
    align-items:center;
    height:50px;
    background-color:#FB197C;
    cursor:pointer;
    color:white;
    font-size:1.2rem;
    border-radius:8px; /*To get rounded corners*/
    transition:all 0.25s ease;
}

.reqbutton:hover
{
    opacity:80%;
}

</style>
<body>
<div class="header">
    <p id="titlehead"><a href="homepage.php">G E N E S I S</a></p>
</div>
<br>
<div class="back"><a href="<?php echo $back; ?>" style="color:blue;">Back</a></div>
<div class="desc">
    <div id="imgcontainer"><img id="img" src="Images\<?php echo $row["url"]; ?>"></div>
    <div id="desccontainer">
    <span class="content"><i><font color="#FB197C">Title:</font></i> <?php echo $row["title"]; ?></span>
    <span class="content"><i><font color="#FB197C">Author:</font></i> <?php echo $row["author"]; ?></span>
    <span class="content"><i><font color="#FB197C">Genre:</font></i> <?php echo $row["genre"]; ?></span>
    <span class="content"><i><font color="#FB197C">Accession number:</font></i> <?php echo $row["accno"]; ?></span>
    <div class="reqbutton">Request this book</div>
    </div>
</div>
</body>
</html>

