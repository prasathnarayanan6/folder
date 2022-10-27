<?php
    require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin sign-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
body {font-family: Arial, Helvetica, sans-serif; }
form {border: 3px solid #f1f1f1; background-color: #f1f1f1}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius:12px;
  cursor: pointer;
  width: auto;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: black;
  border-radius:12px;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  margin:auto;  
}

span.psw {
  float: right;
  padding-top: 16px;
}
.cn{
    width: auto;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 50%;
  }
}
</style>
</head>
<body>
<div class="container mt-5 cn">
<form method="POST" action="#">
<center><h2 class="ms-4 mt-5">HR login</h2></center>
<script>document.getelementbyId("hello");</script>  
<?php
if(isset($_SESSION["error"])) { ?>
<p style="color: red;"><?= $_SESSION['error'];?></p>
<?php unset($_SESSION['error']); } ?>
  <div class="container">
    <div class="row ms-3 mt-3">
        <div class="col-md-4 mt-3">
            <label for="empid"><b>Employee ID</b></label>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Employee ID" name="EmpID" required>
        </div>
    </div><!--row-->
    <div class="row ms-3 mt-3">
        <div class="col-md-4 mt-4">
            <label for="empid"><b>Password</b></label>
        </div>
        <div class="col-md-6">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
    </div><!--row-->
    <div class="row ms-3 mt-3">
        <div class="col-md-4">
            <button type="submit" name="Signin">Login</button>
        </div>
        <div class="col-md-6">
             <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </div>    
    
    
  </div>
</form> 
</div> 

<?php

if(isset($_POST['Signin']))
{
    $EmpID = $_POST["EmpID"];
    $password = $_POST["password"];
    $query = "SELECT * FROM hr_login WHERE Emp_ID ='".$EmpID."' AND Password ='".$password."'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['EmpID']=$EmpID;
        $_SESSION['password']=$password;
        header("location:index.php");
    } 
    else
    {
      //echo "<script>alert('Incorrect');</script>";
      echo "<div id='hello' class='alert alert-danger'>Username or password not correct</div>;";
    }
}


?>
</body>
</html>