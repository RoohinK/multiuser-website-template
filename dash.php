<?php
include("config.php");
session_start();
$u=$_SESSION['printuser'];
echo "<H2>welcome,</H2>".$_SESSION['printuser'];
if(isset($_POST["submit"]))
{
   $medi=$_POST["name"];
   $qtty=$_POST["qtty"];
   $q4="insert into $u values('$medi', '$qtty');";

   if(mysqli_query($con, $q4))
   {
    echo "<script>alert('submitted!');</script>";
   }
}


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Document</title>
</head>
<body>
<BR>
<BR>
<BR>
<BR>
<BR>
<BR>

<center>
<div id="edit1">
<p class="sign" style="margin-left:20%;">MEDICINE TRACKER</p>
</div>
</center>
<center>
<div id="edit2">

<form id="logincard" action="dash.php" method="post" >            
        <div class="textfield">
            <label for="usernameemail">Medicine Name</label>
            <input type="text" name="name">
        </div>

        <div class="textfield">
            <label for="qtty">medicine qtty</label>
            <input type="text" name="qtty">
        </div> 

        <div class="textfield">  
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </div>
    
</form>    

<br>
<br>
<br>
<a href="logout.php">logout</a>



</div>
    
</body>
</html>