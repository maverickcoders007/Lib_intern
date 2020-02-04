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

if(isset($_POST["click"]))
{
$rollno = $_POST["rno"];
$title = $_POST["title"];
$author = $_POST["author"];
$rl1 = $_POST["rl1"];
$rl2 = $_POST["rl2"];

$query="INSERT into suggestions values ('$rollno','$title','$author','$rl1','$rl2')";
$result=mysqli_query($conn, $query);
header("Location:thankyou.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<link href="https://fonts.googleapis.com/css?family=Barlow:300i,400,400i&display=swap" rel="stylesheet">
<title>Genesis - Suggest a book</title>
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
    background-color:#F8F9F9;
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

#formholder
{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    width:60%;
    padding:2% 2%;
    background-color:white;
    margin:auto;
    margin-top:80px;
    -webkit-box-shadow: 0px 0px 3px 1px #D5D8DC;
    -moz-box-shadow: 0 4px 3px 1px #D5D8DC;
    box-shadow: 0px 0px 3px 1px #D5D8DC;
    margin-bottom:2.5%;
}

#formholder #title
{
    margin-top:2%;
    font-size:1.3rem;
    margin-bottom:7%;
    letter-spacing:1px;
}

#formholder form
{
    display:flex;
    flex-direction:column;
    align-items:center;
    width:85%;
}

#formholder form .content
{
    display:flex;
    flex-direction:column;
    width:60%;
    margin-bottom:4%;
}

#formholder form .content .label
{
    font-size:1.2rem;
    margin-bottom:2%;
}

#formholder form .content .req
{
    font-size:0.9rem;
    font-style:italic;
    margin-bottom:2.5%;
    color:#FB197C;
}

#formholder form .content input[type="textbox"]
{
    font-family: 'Barlow', sans-serif;
    font-size:1.1rem;
    padding:10px 10px;
    width:fit;
    border:2px solid #D5D8DC;
    margin-bottom:2%;
}

#formholder form .content input[type="textbox"]:hover,#formholder form .content input[type="textbox"]:focus
{
    outline:none;
    border:2px solid #FB197C;
}

#formholder form #button
{
    font-family: 'Barlow', sans-serif;
    width:60%;
    font-size:1.2rem;
    padding:15px 0px;
    border:none;
    color:white;
    background-color:#FB197C;
    cursor:pointer;
    transition:all 0.25s ease;
    border-radius:8px;
    margin-bottom:5%;
}

#formholder form #button:focus
{
    outline:none;
}

#formholder form #button:hover
{
opacity:80%;
}

</style>
<body>

<script>
    if ( window.history.replaceState ) { //used to stop form resubmission when page is refreshed
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<div class="header">
        <p id="titlehead"><a href="homepage.php">G E N E S I S</a></p>
</div>

<div id="formholder">
    <div id="title"><font color="#FB197C">SUGGEST A BOOK</font> FOR THE LIBRARY</div>

    <form method="POST"> <!--Return false is used to prevent from reloading the page-->

    <div class="content">
    <span class="label">Enter your roll number</span>
    <span class="req">required field</span>
    <input name="rno" type="textbox" spellcheck="false" autocomplete="off" placeholder="Roll no" required> <!--name is used to get value of textbox for php script-->
    </div>

    <div class="content">
    <span class="label">Enter the title of the book</span>
    <span class="req">required field</span>
    <input name="title" type="textbox" spellcheck="false" autocomplete="off" placeholder="Title" required> <!--name is used to get value of textbox for php script-->
    </div>

    <div class="content">
    <span class="label">Enter the author</span>
    <span class="req">required field</span>
    <input name="author" type="textbox" spellcheck="false"autocomplete="off" placeholder="Author" required>
    </div>

    <div class="content">
    <span class="label">Related links (ex - amazon, goodreads...)</span>
    <span class="req">This field is not mandatory. It is just to help us easily find the book which you are suggesting.</span>
    <input name="rl1" type="textbox" autocomplete="off" spellcheck="false" placeholder="Related link 1">
    <input name="rl2" type="textbox" autocomplete="off" spellcheck="false" placeholder="Related link 2">
    </div>

    <input id="button" name="click" type="submit" value="Suggest"></input>
    </form>

</div>

<!--<script type="text/javascript">

function thankyou()
{
var formholder=document.getElementById("formholder");
formholder.style.backgroundColor="blue";
}
</script>-->
</body>
</html>