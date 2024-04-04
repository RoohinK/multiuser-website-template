<?php
include("config.php");
if(isset($_POST["submit"]))
{

$email=$_POST["email"];
$name=$_POST["name"];
$uname=$_POST["username"];
$pass=$_POST["password"];
$cpass=$_POST["confirmpassword"];
$q=mysqli_query($con,"SELECT * FROM credential WHERE username='$uname' or email='$email'");
if(mysqli_num_rows($q)>0)
{
    echo "<script>alert('username/password has been taken');</script>";
}
else
{
    if($pass==$cpass)
    {
        $q1="insert into credential values('$name', '$uname', '$email', '$pass')";

        if(mysqli_query($con,$q1))
        {
            echo "<script>alert('registration successful');</script>";
        }
        $q2="create table $uname(medname VARCHAR(50), quantity VARCHAR(10));";
        mysqli_query($con,$q2);
    }
    else
    {
        echo "<script>alert('passwords do not match');</script>";
    }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>MedEasy login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/github.png" type="image/x-icon">
    <style>
        

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        img {
            width: 4.9rem;
            margin: 1% 50%;
        }
        
        .sign {
            display: flex;
            text-align: center;
            font-size: medium;
            font-size: 1.4rem;
            font-weight: 100;
            margin-left:21%;
        }
        
        .sign1 {
            display: flex;
            text-align: center;
            font-size: 20px;
            font-size: 1.4rem;
            font-weight: 100;
            margin-left:28%;
        }  
        #edit2
        {
            width:30%;
        }
        
        #logincard {
            width: 19.25rem;
            height: 13.6rem;
            padding: 0.7rem;
            display: flex;
            flex-direction: column;
            background-color: rgb(246, 249, 249);
            border-radius: 2%;
            border: solid 1px rgb(219, 218, 218);
            position: relative;
        }
        #registercard {
            width: 19.25rem;
            height: 23rem;
            padding: 0.7rem;
            display: flex;
            flex-direction: column;
            background-color: rgb(246, 249, 249);
            border-radius: 2%;
            border: solid 1px rgb(219, 218, 218);
            position: relative;
        }
        
        label {
            font-weight: 200;
            font-size: 0.9rem;
            color: black;
        }
        
        .textfield {
            display: flex;
            flex-direction: column;
            margin: 3%;
        }
        
        .textfield label {
            margin: 0 0 2% 0;
        }
        
        .textfield input{
            border-radius: 5px;
            padding: 0.7%;
            border: 2px solid transparent;
            outline: none;
        }
        
        input:focus{
            border-color: blue;
        }
        
        .textfield a {
            position: absolute;
            margin: 0.2% 0 0 54%;
            font-size: 0.8rem;
            text-decoration: none;
        }
        
        .textfield button {
            height: 2rem;
            font-size: 14px;
            line-height: 20px;
            padding: 5px 16px;
            border: 1px solid;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
        }
        
        .card2 {
            margin-top: 0.8%;
            width: 19.25rem;
            display: flex;
            flex-direction: column;
            background-color: rgb(253, 255, 255);
            border-radius: 2%;
            align-items: center;
            padding-top: 1%;
            font-size: 0.9rem;  
            border: solid 1px rgb(219, 218, 218);
        }
        
        .card2 a p {
            text-decoration: none;
            justify-content: center;
            display: flex;
            text-align: center;
        }
        
        .footer {
            margin-top: 3%;
            width: auto;
        }
        
        .footer a{
            font-size: 12px;
            text-decoration: none;
            margin: auto;
            padding: 5px;
        }
        
        .black {
            color: rgba(51, 51, 51, 0.831);
        }
        
        @media screen and (max-width: 40rem){
            #logincard {
                max-width: 13rem;
            }
            #registercard {
                max-width: 13rem;
            }
        
            .textfield a {
                position: absolute;
                margin: 2% 0 0 45%;
                font-size: 0.6rem;
                text-decoration: none;
            }
        
            .card2 {
                max-width: 13rem;
                font-size: 0.8rem;
                margin-top:1%;
                padding-top: 3%;
            }
        
            .footer {
                display: flex;
                flex-direction: column;
                max-width: 13rem;
            }
        
            .footer a{
                font-size: 11px;
                text-decoration: none;
                margin: 0;
                padding: 0px;
                display: flex;
                justify-content: center;
            }
        }
        
        @media (max-width: 640px) {
            img {
                margin: 1% 10%;
            }
        
            #logincard,
            #registercard,
            .card2 {
                width: 95%;
            }
        }
        #edit1
        {
            margin-left: 30%;
        }
            </style>
</head>
<body>
<main>
        <img src="med2.png" alt="" style="width:5%">
        <div id="edit2" style="margin-top:0%;">
        <p class="sign1">Register on MedEasy</p>
        </div>
        <form id="registercard" action="register.php" method="post" autocomplete="off">            
                <div class="textfield">
                    <label for="email">Email Address</label>
                    <input type="email" name="email">
                </div>

                <div class="textfield">
                    <label for="name">Your Name</label>
                    <input type="text" name="name">
                </div> 

                <div class="textfield">
                    <label for="username">Username</label>  
                    <input type="text" name="username"> 
                </div>    

                <div class="textfield">
                    <label for="password">Password</label>     
                    <input type="password" name="password">       
                </div> 

                <div class="textfield">
                    <label for="confirmpassword">Confirm Password</label>
                         
                    <input type="password" name="confirmpassword">       
                </div> 
                <div class="textfield">  
                    <button type="submit" class="btn btn-success" name="submit">Register</button>
                </div>
            
</form>    
        
        <br>
        <br>
       
        <div class="footer">
            <p> <a href="satyam.php">Home</a>
                <a href="satyam.php#about2">About Us</a>
                <a href="satyam.php#contacts2"></a>
            </p>
        </div>
        <div class="card2" style="display:block;">
            <p>Already a User? <a href="login.php">Login here.</a></p>
        </div>
        <br>
    </main>
    
</body>
</html>