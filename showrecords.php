<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Barlow:300i,400,400i&display=swap" rel="stylesheet">
<title>Books borrowed</title>
</head>
<style>
body
{
    font-family: 'Barlow', sans-serif;
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
    border:1px solid black;
    padding:20px 10px;
}

.box #label,#label2
{
    color:#2C3E50;
    font-style:italic;
}

form
{
    margin-top:50px;
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
    border:2px solid #2C3E50;
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
    padding:10px 10px;
    background-color:#2C3E50;
    border:2px solid #2C3E50;
    color:white;
    outline:none;
    cursor:pointer;
}

</style>
<body>

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
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM books WHERE Rollno='$rollno'";//SQL query 1
$sql2 = "SELECT Name FROM books WHERE Rollno='$rollno'"; //SQL query 2
$result = mysqli_query($conn, $sql); //resultant array getting stored in this variable
$resultname = mysqli_query($conn, $sql2);

mysqli_close($conn);

?>

</form>
<br>
<hr size="1.5px" color="#2C3E50">
<br>    

<?php

    $name = mysqli_fetch_array($resultname); //get result as numeric array
    $count = mysqli_num_rows($result); // no of rows in result array

    if ($count > 0) { ?>
    <center><u><span id="title">Books borrowed by <?php echo $name[0] ?></span></u></center><br><br>

    <?php while($row = mysqli_fetch_assoc($result)){?>

    <center><div class="box">

    <span><span id="label">Book name</span>: <?php echo $row["Book borrowed"]; ?></span>
    <span><span id="label2">Due date</span>: <?php echo $row["Due date"]; ?></span>

    </div></center>

    <?php }} ?>

<center><span id="error"><?php if (mysqli_num_rows($result) == 0){
    echo "No record found! Try again!";
    }

}
?> </span></center>
<br><br>

</body>
</html>


