<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Barlow:300i,400,400i&display=swap" rel="stylesheet">
<title>Genesis - Books borrowed</title>
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

#title
{
    font-size:1.5rem;
    margin-top:10px;
    color:#2C3E50;
    font-style:italic;
}

#error
{
    font-size:1.5rem;
    color:#2C3E50;
}

.box
{
    margin-top:20px;
    font-size:1.2rem;
    width:60%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    border:1.5px solid #FB197C;
    padding:20px 10px;
}

.box #label,#label2
{
    color:#FB197C;
    font-style:italic;
}

form
{
    margin-top:100px;
}

#text1
{
    display:flex;
    padding:10px 10px;
    width:60%;
    border:2px solid #E5E7E9;
}

#text1:hover,#text1:focus
{
    color:#2C3E50;
    border:2px solid #FB197C;
    outline:none;
}

input[type="textbox"]
{
    font-family: 'Barlow', sans-serif;
    font-size:1.2rem;
}

#but,#but:focus
{
    font-family: 'Barlow', sans-serif;
    font-size:1.2rem;
    width:40%;
    padding:12px 12px;
    background-color:#FB197C;
    border:none;
    color:white;
    outline:none;
    cursor:pointer;
    border-radius:8px; /*To get rounded corners*/
    transition:all 0.25s ease;
}

#but:hover
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

<form action="" method="POST">
<center><input id="text1" type="textbox" autocomplete="off" placeholder="Enter your roll number to check for the books you have borrowed..." name="rno"><br><br>
<input id="but" type="submit" name="click" value="Check books borrowed"></center>
<?php

if(isset($_POST["click"]))
{
$rollno = $_POST["rno"];
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

$stmt =$conn->prepare("SELECT * FROM books WHERE Rollno=?");//SQL query 1 - *to prevent sql injection we use prepared statements*
$stmt->bind_param("s",$rollno);
$stmt->execute();

$result = $stmt->get_result(); //resultant array getting stored in this variable | get_result() is used to get resultant array after executing the prepared statement


/*$sql="SELECT * from books where Rollno='$rollno'";
$result=mysqli_query($conn,$sql);*/

mysqli_close($conn);


?>

</form>
<br>
<hr color="#2C3E50" width="95%">
<br>    

<?php

    $dummy=0; //dummy variable to print "Books borrowed by..." first time
    $count = mysqli_num_rows($result); // no of rows in result array

    if ($count > 0) { ?>

    <?php while($row = mysqli_fetch_assoc($result)){
        if($dummy == 0)
        {?>
        <center><u><span id="title">Books borrowed by <?php echo $row["Name"] ?></span></u></center><br><br>
        
        <?php $dummy=1;
        } ?>

    <center><div class="box">

    <span><span id="label">Book name:</span> <?php echo $row["Book borrowed"]; ?></span>
    <span><span id="label2">Due date:</span> <?php echo $row["Due date"]; ?></span>

    </div></center>

    <?php }}
    $stmt->close(); /*Closing the prepared query*/
    ?>

<center><span id="error"><?php if ($count == 0){
    echo "No record found!";
    }

}
?> </span></center>
<br><br>

</body>
</html>


