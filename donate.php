<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<link href="https://fonts.googleapis.com/css?family=Barlow:300i,400,400i&display=swap" rel="stylesheet">
<title>Genesis - Donate a book</title>
<script src="donate.js" type="text/javascript"></script>
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
    margin-top:100px;
    -webkit-box-shadow: 0px 0px 3px 1px #D5D8DC;
    -moz-box-shadow: 0 4px 3px 1px #D5D8DC;
    box-shadow: 0px 0px 3px 1px #D5D8DC;
    margin-bottom:2.5%;
}

#formholder #titleheadinside
{
    visibility:visible;
    margin-top:0;
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

#thanks
{
    position:absolute;
    visibility:hidden;
    width:50%;
    margin:auto;
    top:25%;
    display:flex;
    font-size:1.2rem;
    /*background-color:green;*/
    align-items:center;
    flex-direction:column;
    justify-content:center;
}


#thanks a 
{
    margin-top:5%;
}

#formholder #backicon
{
    visibility:visible;
    position:relative;
    display:flex;
    align-self:flex-start;
    height:45px;
    z-index:49;
    cursor:pointer;
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
<img id="backicon" src="back.png" onclick="gotolink('homepage.php')">

    <div id="titleheadinside"><font color="#FB197C">DONATE A BOOK</font> FOR THE LIBRARY</div>

    <div id="thanks">
    <img src="ty.png" height="60%" width="80%">
    <br>
    <i>Thank you for your submission!</i>
    <a href="homepage.php" style="color:#FB197C">Go to homepage</a>

    </div>  

    <form id="donform"> <!--Return false is used to prevent from reloading the page-->

    <div class="content">
    <span class="label">Enter your roll number</span>
    <span class="req">required field</span>
    <input id="rno" type="textbox" spellcheck="false" autocomplete="off" placeholder="Roll no" onchange="checkrno()"> <!--name is used to get value of textbox for php script-->
    <span id="rollnostatus" style="color:red"></span>
    </div>

    <div class="content">
    <span class="label">Enter the title of the book</span>
    <span class="req">required field</span>
    <input id="title" type="textbox" spellcheck="false" autocomplete="off" placeholder="Title"> <!--name is used to get value of textbox for php script-->
    </div>

    <div class="content">
    <span class="label">Enter the author</span>
    <span class="req">required field</span>
    <input id="author" type="textbox" spellcheck="false"autocomplete="off" placeholder="Author">
    </div>

    <input id="button" name="click" type="button" value="Submit" onclick="yeahsubmit()"><!--AJAX call for submission-->
    </form>
</div>

</body>
</html>