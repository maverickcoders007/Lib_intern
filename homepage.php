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

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<link href="https://fonts.googleapis.com/css?family=Barlow:300i,400,400i&display=swap" rel="stylesheet">
<title>Genesis - Home</title>
</head>
<style>

html
{
    height:100%;
    width:100%;
    font-size:16px;
    /*scroll-behavior:smooth;*/
}

body
{
    font-family: 'Barlow', sans-serif; 
    margin:0;
    cursor:default;
}

#header
{
    background-color:black;
    z-index:150;
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
    transition: top 0.25s;
}

#header #titlehead
{
    color:white;
    cursor: default;
    margin:auto;
    padding-bottom:5px;
    font-size:1.5rem;
    font-style:italic;
}

#header #list
{
    bottom:25%; /*For internet explorer*/
    position:absolute;
    margin-left:2.5%;
    cursor:pointer;
}

.label
{
margin-left:2.5%;
margin-top:80px;
font-size:1.8rem;
}

.newarr,.genre
{
    width:95%;
    margin-top:1%;
    margin-left:2.5%;
    display:flex;
    flex-direction:row;
    height:60%;
    align-items:center;
    overflow-x:auto;
    overflow-y:hidden;  
}

.newarr a
{
    min-width:230px;
    max-width:230px;
    margin-right:20px;
    height:490px;
    text-decoration:none;
    margin-bottom:10px;
}


.newarr .newbox 
{
    overflow:hidden;
    /*margin-left:25px;*/
    margin-right:20px;
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:flex-start;
    font-size:1.2rem;
    height:100%;
    color:#FB197C;
}

/*.newarr .newbox a,a:visited
{
    margin-top:5px;
    color:blue;
    align-self:flex-end;
    font-size:1rem;
    text-decoration:none;
    margin-bottom:10px;
}

.newarr .newbox a:hover
{
    text-decoration:underline;
}*/

.newarr .newbox .title,.author
{   
    color:black;
    padding-top:2px;
    margin-bottom:2px;
    white-space: nowrap; 
    overflow:hidden;
    width:100%;
    height:25px;
    text-overflow: ellipsis;
}

.newarr a:hover .imgbook
{
    transition:all 0.25s ease;
    opacity:60%;
}

.newarr .newbox .imgbook
{
object-fit:cover;
min-height:350px;
max-height:350px;
overflow:hidden;
background-color:#BFC9CA;
width:100%;   
margin-bottom:8%;
}


.genre a
{
    margin-top:1%;
    margin-bottom:2%;
    height:100px;
    text-decoration:none;
    margin-right:1.5%;
    max-width:20%;
    min-width:20%;
}

.genrebox 
{
    display:flex;
    align-items:center;
    justify-content:center;
    height:100%;
    width:100%;
    border:2px solid #2C3E50;
    color:#FB197C;
    font-size:1.3rem;
    font-style:italic;
    border-radius:8px;
    cursor:pointer;
}

.genrebox:hover
{
    color:#2C3E50;
    text-decoration:underline;
    border-color:#FB197C;
    font-size:1.5rem;
}

.desc
{
margin-left:2.5%;
font-size:1.2rem;
margin-right:2.5%;
line-height:1.6;
font-style:italic;
}

.button
{
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
    margin-top:2%;
    margin-bottom:5%;
    height:50px;
    width:80%;
    background-color:white;
    border:1.5px solid #2C3E50;
    cursor:pointer;
    color:#2C3E50;
    font-size:1.2rem;
    border-radius:8px; /*To get rounded corners*/
    transition:all 0.25s ease;
}

.button:hover
{
    border:1.5px solid #FB197C;
    color:#FB197C;
}

.others
{
    width:80%;
    margin:auto;
    margin-top:2.5%;
    margin-bottom:2.5%;
    display:flex;
    align-items:center;
    flex-direction:column;
    margin-bottom:8%;
}

/*.others .othstuff
{
    display:flex;
    flex-direction:row;
    align-items:baseline;
    margin:auto;
    width:80%;
    font-size:1.5rem;
    justify-content:center;
    margin-bottom:5%;
    font-style:italic;
    background-color:green;
}*/

.others .othbutton
{
    font-style:normal;
    width:80%;
    margin-left:1%;
    margin-top:2%;
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

.others .othbutton:hover
{
    opacity:80%;
}

#footer
{
    /*visibility:hidden;*/
    bottom:0;
    font-size:1rem;
    position:relative;
    top:5%;
    display:flex;
    align-items:center;
    justify-content:flex-end;
    width:100%;
    background-color:black;
    color:white;
    height:150px;
    flex-direction:row;
}

#footer #clg
{
    position:absolute;
    left:0;
    /*margin-right:auto;/*To align flexbox item to left when justify-content is set to flex-end*/
    font-style:italic;
    margin-left:2.5%;
}

#footer #links
{
    display:flex;
    flex-direction:column;
    margin-right:2.5%;
    width:15%;
    align-items:flex-start;
}

#footer p
{
    margin-top:5px;
    margin-bottom:5px;
    cursor:pointer; 
    transition:color 0.25s ease;

}

#footer a,a:visited
{
    padding:5px 0;
    text-decoration:none;
    color:white;
    transition:color 0.25s ease;
}

#footer a:hover,#footer p:hover
{
    color:#FB197C;
}

.events
{
display:flex;
justify-content:center;
align-items:center;
margin-left:2.5%;
width:95%;
height:400px;
border:1px solid black;
}

.newarr::-webkit-scrollbar,.genre::-webkit-scrollbar {
        height:8px;
        border-bottom:2px solid #2C3E50;
    }

    /* Track */
.newarr::-webkit-scrollbar-track,.genre::-webkit-scrollbar-track {
       
    }

    /* Handle */
.newarr::-webkit-scrollbar-thumb,.genre::-webkit-scrollbar-thumb {
        background:#BFC9CA;
    }

    /* Handle on hover */
.newarr::-webkit-scrollbar-thumb:hover,.genre::-webkit-scrollbar-thumb:hover {
        background:#FB197C; 
}


#overlay
{
    visibility:hidden;
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:black;
    opacity:0.8;
    z-index:151;
    pointer-events:auto;
}

#overlay #dummy
{
    position:fixed;
    height:100%;
    width:100%;
    margin-top:0;
    left:0;
    right:0;
    margin-bottom:0;
    cursor:default;
}

#sideicon
{
    opacity:0;
    right:15px;
    position:fixed;
    border-radius:50px;
    /*padding:10px 10px;*/
    bottom:20px;
    z-index:80;
    transition:opacity 0.1s ease-in-out;
}

/*#sideiconpopup
{
    visibility:hidden;
    position:fixed;
    display:flex;
    align-items:center;
    justify-content:center;
    background-color:white;
    border-radius:8px;
    right:15px;
    bottom:105px;
    height:35px;
    width:90px;
    z-index:90;
    -webkit-box-shadow:1.8px 1.8px 3px 1px #ccc;  
    -moz-box-shadow:1.8px 1.8px 3px 1px #ccc; 
    box-shadow:1.8px 1.8px 3px 1px #ccc;
}*/

#feedbackform
{
    display:flex;
    align-self:center;
    margin-left:25%;
    margin-right:25%;
    padding:10px 10px;
    height:70%;
    width:50%;
    background-color:white;
    position:fixed;
    z-index:155;
    border-radius:8px;
    opacity:1;
    visibility:hidden;
}

.mysidebar
{
    position:fixed;
    top:0;
    left:0;
    height:100%;
    overflow-x:hidden; /*very important */
    display:flex;
    flex-wrap:nowrap;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    width:0;
    z-index:155;
    background-color:white; /*or #FB197C*/
    transition: 0.4s ease;
}

.mysidebar a,a:visited
{
    text-align:center;
    height:25px;
    overflow:hidden;
    white-space:nowrap;
    text-decoration:none;
    color:black;
    font-size:1.2rem;
    margin-bottom:25px;
    opacity:1;
    /*display:block;*/
    transition:0.25s ease;
}

.mysidebar a:hover
{
    color:#FB197C;
}

.mysidebar #active
{
    color:#FB197C;
    cursor:default;
    
}

</style>
<body>
<?php
$sql = "SELECT * FROM newarrivals";//SQL query 1
$result = mysqli_query($conn, $sql); //resultant array getting stored in this variable
?>

<div id="overlay">
<p id="dummy" onclick="closefeedback()"></p>
</div>

<img onclick="totop()" src="top.png" id="sideicon" height="50px" width="50px">

<!--<div id="sideiconpopup">
Feedback
</div>-->

<div id="feedbackform">
Feedback form
</div>



<div id="header">
        <img id="list" src="list.png" onclick="opensb()" height="25px" width="30px"> <!--height="25px" width="30px"-->
        <p id="titlehead">G E N E S I S</p>        
</div>

<div class="mysidebar" id="sidebar">
<a id="active">HOME</a>
  <a href="booksborrowed.php">BOOKS BORROWED</a>
  <a href="#">NEW ARRIVALS</a>
  <a href="#">GENRES</a>
  <a href="suggabook.php">SUGGEST A BOOK</a>
  <a href="donate.php">DONATE A BOOK</a>
</div>

<p class="label">New Arrivals</p>
<hr color="#FB197C" width="95%">
<p class="desc">Check out some of the new arrivals in the library!</p>
<div class="newarr">

    <?php while($row = mysqli_fetch_assoc($result)){?>

    <a href="newarrdesc.php?title=<?php echo $row["title"]; ?>&back=homepage.php">
    <div class="newbox">

    <img class="imgbook" src="Images\<?php echo $row["url"]; ?>">

    <u>Title:</u><span class="title"><?php echo $row["title"]; ?></span>
    <u>Author:</u><span class="author"><?php echo $row["author"]; ?></span>
    </div>
    </a>
    <?php } ?>

</div>

<p class="label">Genre</p>
<hr color="#FB197C" width="95%">
<p class="desc">In love with some genre? Check out books from various genres!</p>
<div class="genre">
<?php
$sql="SELECT distinct genre from newarrivals";
$result=mysqli_query($conn,$sql);

mysqli_close($conn);
?>
<?php while($row = mysqli_fetch_assoc($result)){?>

<a href="genrelist.php?genre=<?php echo $row["genre"]; ?>">
<div class="genrebox">
<?php echo $row["genre"]; ?>
</div>
</a>

<?php } ?>
</div>

<p class="label">Books borrowed</p>
<hr color="#FB197C" width="95%">
<p class="desc">Forgot which books you borrowed from the library? Want to know the due date for 
a borrowed book? Click on the button below and just provide me your roll no and I shall let you 
know what books you have borrowed along with their due date!</p>
<div class="button" onclick="bblink()">Check for books you have borrowed</div>

<p class="label">Events</p>
<hr color="#FB197C" width="95%">
<p class="desc">Check out the upcoming events in the library!</p>
<div class="events">
Event boxes go here... (But before that create events table in database)
</div>

<p class="label">Other stuff you can do</p>
<hr color="#FB197C" width="95%">
<p class="desc">Here are some other library related stuff you can do!</p>

<div class="others">
<div class="othbutton" onclick="gotolink('suggabook.php')">Suggest a book</div>

<div class="othbutton" onclick="gotolink('donate.php')">Donate a book</div>

<!--<div class="othbutton">Request a book</div>-->

<div class="othbutton">Ask a question</div>
</div>

<div id="dummy"></div>

<div id="footer">
<span id="clg">PSG College of Technology</span>
<div id="links">
    <a href="#">About</a>
    <a href="#">Contact</a>
    <p onclick="feedback()">Feedback</p>
    <a href="http://events.psgtech.edu/library/#" target="_blank">Go to library website</a>
</div>
</div>

<script src="homepage.js" type="text/javascript">
</script>

</body>
</html>