<?php

$genre=$_REQUEST["genre"];

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<link href="https://fonts.googleapis.com/css?family=Barlow:300i,400,400i&display=swap" rel="stylesheet">
<title>Genre - <?php echo $genre; ?></title>
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
    background-color:black;
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
    margin-left:2.5%;
    width:20%; 
    font-size:1.2rem;
}

.label
{
margin-left:2.5%;
margin-top:110px;
font-size:1.5rem;
}

.genlist
{
    margin-left:2.5%;
    margin-right:2.5%;
    margin-top:30px;
    width:fit-content;
    display:flex;
    flex-direction:row; 
    flex-wrap:wrap;
}

.genlist a
{
    min-width:230px;
    max-width:230px;
    margin-right:20px;
    height:440px;
    text-decoration:none;
}


.genlist .newbox 
{
    overflow:hidden;
    /*margin-left:25px;*/
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:flex-start;
    font-size:1.2rem;
    height:100%;
    color:#FB197C;
}

.genlist .newbox .title
{   
    color:black;
    margin-bottom:2px:
    flex-wrap:none;
    white-space: nowrap; 
    overflow:hidden;
    width:100%;
    height:25px;
    text-overflow: ellipsis;
}

.genlist a:hover .imgbook
{
    transition:all 0.25s ease;
    opacity:60%;
}

.genlist .newbox .imgbook
{
object-fit:cover;
min-height:350px;
max-height:350px;
overflow:hidden;
background-color:#BFC9CA;
width:100%;   
margin-bottom:5%;
}

</style>
<body>
<div class="header">
    <p id="titlehead"><a href="homepage.php">G E N E S I S</a></p>
</div>
<br>
<div class="back"><a href="homepage.php" style="color:blue;">Back to homepage</a></div>
<br>
<p class="label">Here are some <?php echo $genre; ?> books for you</p>
<hr color="#FB197C" width="95%">

<?php
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

$sql = "SELECT * FROM newarrivals WHERE genre='$genre'";//SQL query 1 
$result = mysqli_query($conn, $sql); //resultant array getting stored in this variable

mysqli_close($conn);
?>

<div class="genlist">

<?php while($row = mysqli_fetch_assoc($result)){?>

<a href="newarrdesc.php?title=<?php echo $row["title"]; ?>&back=genrelist.php?genre=<?php echo $genre; ?>">
<div class="newbox">

<img class="imgbook" src="Images\<?php echo $row["url"]; ?>">

<u>Title:</u><span class="title"><?php echo $row["title"]; ?></span>
</div>
</a>
<?php } ?>

</div>
</body>
</html>