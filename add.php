<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
?>



<?php 
    include_once("connection.php");
?>

<?php 
session_start();
require "connection.php";
if(!isset($_SESSION['EmpID']) && !isset($_SESSION['password'])){
    header('location:admin_login.php');
	  die();
}	//header('location:admin_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Attendance</title>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Google Fonts - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  min-height: 100%;
  background: white;
}
nav {
  position: fixed;
  top: 0;
  left: 0;
  height: 50px;
  width: 100%;
  display: flex;
  align-items: center;
  background: white;
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
}
nav .logo {
  display: flex;
  align-items: center;
  margin: 0 24px;
}
.logo .menu-icon {
  color: #333;
  font-size: 24px;
  margin-right: 14px;
  cursor: pointer;
}
.logo .logo-name {
  color: #333;
  font-size: 22px;
  font-weight: 500;
}
nav .sidebar {
  position: fixed;
  top: 0;
  left: -100%;
  height: 100%;
  width: 260px;
  padding: 20px 0;
  background-color: lightblue;
  box-shadow: 0 5px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.4s ease;
}
nav.open .sidebar {
  left: 0;
}
.sidebar .sidebar-content {
  display: flex;
  height: 100%;
  flex-direction: column;
  justify-content: space-between;
  padding: 30px 16px;
}
.sidebar-content .list {
  list-style: none;
}
.list .nav-link {
  display: flex;
  align-items: center;
  margin: 8px 0;
  padding: 14px 12px;
  border-radius: 8px;
  text-decoration: none;
}
.lists .nav-link:hover {
  background-color: #4070f4;
}
.nav-link .icon {
  margin-right: 14px;
  font-size: 20px;
  color: #707070;
}
.nav-link .link {
  font-size: 16px;
  color: #707070;
  font-weight: 400;
}
.lists .nav-link:hover .icon,
.lists .nav-link:hover .link {
  color: #fff;
}
.overlay {
  position: fixed;
  top: 0;
  left: -100%;
  height: 1000vh;
  width: 200%;
  opacity: 0;
  pointer-events: none;
  transition: all 0.4s ease;
  background: rgba(0, 0, 0, 0.3);
}
nav.open ~ .overlay {
  opacity: 1;
  left: 260px;
  pointer-events: auto;
}

    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<div class="naviga">
<nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">WELCOME ADMIN</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">ADMIN</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="attendance.php" class="nav-link">
                <i class='fas fa-user-tie icon'></i>
                <span class="link">Attendance</span>
              </a>
            </li>
            <li class="list">
              <a href="payroll.php" class="nav-link">
                <i class='bx bx-money-withdraw icon'></i>
                <span class="link">Payroll</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-bell icon"></i>
                <span class="link">Notifications</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-message-rounded icon"></i>
                <span class="link">Messages</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Analytics</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-heart icon"></i>
                <span class="link">Likes</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">Files</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-cog icon"></i>
                <span class="link">Settings</span>
              </a>
            </li>
            <li class="list">
              <a href="logout.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>
</div>
<!--<section class="overlay"></section>-->


        <div class="table-heading mt-5">
            <center><h2 style="font-weight: bolder;">Add Employee</h2><center>
        </div>
        <div class="container mt-4" style="border-radius:5px;">
        <?php
            error_reporting(0);
            if($_SERVER['REQUEST_METHOD']=='POST' || isset($_FILES['my_image'])){
                $hrid=$_POST['hr_id'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                $phone=$_POST['phno'];
                $jdate=$_POST['jdate'];
                //if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
                  //include "connection.php";
                
                  echo "<pre>";
                  print_r($_FILES['my_image']);
                  echo "</pre>";
                
                  $img_name = $_FILES['my_image']['name'];
                  $img_size = $_FILES['my_image']['size'];
                  $tmp_name = $_FILES['my_image']['tmp_name'];
                  $error = $_FILES['my_image']['error'];
                
                  if ($error === 0) {
                    if ($img_size > 125000) {
                      $em = "Sorry, your file is too large.";
                        header("Location: index.php?error=$em");
                    }else {
                      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                      $img_ex_lc = strtolower($img_ex);
                
                      $allowed_exs = array("jpg", "jpeg", "png"); 
                
                      if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                
                        // Insert into Database
                        $query = "insert into emp(emp_id,name,email,jdate,phone,emp_file) values('$hrid','$name','$email','$jdate','$phone','$new_img_name')";
                        $result=$conn->query($query);
                        header("Location: attendance.php");
                        //$sql = "INSERT INTO hr_add(hr_file) 
                        //        VALUES('$new_img_name')";
                       // mysqli_query($conn, $sql);
                      }else {
                        $em = "You can't upload files of this type";
                            header("Location: index.php?error=$em");
                      }
                    }
                  }else {
                    $em = "unknown error occurred!";
                    header("Location: index.php?error=$em");
                  }
                
                }
                //$img_name = $_FILES['my_image']['name'];
	              //$img_size = $_FILES['my_image']['size'];
	              //$tmp_name = $_FILES['my_image']['tmp_name'];
	              //$error = $_FILES['my_image']['error'];
                //$file=$_file['file']; 
                #file name with a random number so that similar dont get replaced
                //$pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                //$tname = $_FILES["file"]["tmp_name"];
                //$uploads_dir = '/img';
                #TO move the uploaded file to specific location
                //move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                
                            
                  // echo "<pre>";
                  // print_r($_FILES['my_image']);
                  // echo "</pre>";
                  //$img_name = $_FILES['my_image']['name'];
                  //$img_size = $_FILES['my_image']['size'];
                  //$tmp_name = $_FILES['my_image']['tmp_name'];
                  //$error = $_FILES['my_image']['error'];
                
                  //if ($error === 0) 
                  //{
                    //if ($img_size > 125000)
                     //{
                      //$em = "Sorry, your file is too large.";
                        //header("Location: index.php?error=$em");
                    //}
                  //}
                //else 
                //{
                  //header("Location: add_hr.php");
                //}
                if($hrid=="" || $name=="" ||$email==""||$phone==""){
                  // echo "<div class='alert alert-danger'>
                     //  Fields must not be empty;
                    //</div>";
                }
                //else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                   // echo "<div class='alert alert-danger'>
                   // Invalid email format!!
                 //</div>";
                //}
                else{
                    // Insert into Database
                    //$sql = "INSERT INTO hr_add(hr_file) 
                           // VALUES('$new_img_name')";
                    //mysqli_query($conn, $sql);
          //file handling

          //file handling
                    //$query = "insert into hr_add(hr_id,hr_name,hr_email,hr_phone,hr_file) values('$hrid','$name','$email','$phone','')";
                    //$result=$conn->query($query);
                    //if($result){
                     // echo "<div class='alert alert-success'>
                      //Data inserted successfully;
                      //</div>";
                   // }
                

                  ////file handling
          if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
            //include "connection.php";
          
            //echo "<pre>";
            //print_r($_FILES['my_image']);
            //echo "</pre>";
          
            //$img_name = $_FILES['my_image']['name'];
            //$img_size = $_FILES['my_image']['size'];
            //$tmp_name = $_FILES['my_image']['tmp_name'];
            //$error = $_FILES['my_image']['error'];
          
            //if ($error === 0) {
              //if ($img_size > 125000) {
                //$em = "Sorry, your file is too large.";
                  //header("Location: index.php?error=$em");
              //}else {
                //$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                //$img_ex_lc = strtolower($img_ex);
          
         //       $allowed_exs = array("jpg", "jpeg", "png"); 
          
               // if (in_array($img_ex_lc, $allowed_exs)) {
                 // $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                 // $img_upload_path = 'uploads/'.$new_img_name;
                 // move_uploaded_file($tmp_name, $img_upload_path);
          
                  // Insert into Database
                  //$sql = "INSERT INTO hr_add(hr_file) 
                 //         VALUES('$new_img_name')";
                  //mysqli_query($conn, $sql);
                  //header("Location: employee_list.php");
                //}else {
                 // $em = "You can't upload files of this type";
                 //     header("Location: index.php?error=$em");
                //}
              //}
            //}else {
              //$em = "unknown error occurred!";
              //header("Location: index.php?error=$em");
            //}
          
          //}else {
            //header("Location: index.php");
          //}

          $email1=$_POST['email'];  
          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          $password = substr( str_shuffle( $chars ), 0, 8 );
          //$password = '3sc3RLrpd17';
         // $method = 'aes-256-cbc';
          
          // Must be exact 32 chars (256 bit)
          //$password = substr(hash('sha256', $password, true), 0, 32);
          //echo "Password:" . $password . "\n";
          
          // IV must be exact 16 chars (128 bit)
          //$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
          
          // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
          //$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));
          if($email==""){
            echo "<div class='alert alert-danger'>
              email should'nt be empty;
              </div>";
          }
          else{
          $query1="insert into emp_login(`emp_id`, `password`) values('$email1','$password')";
          $result=$conn->query($query1);
          if($result){  
          echo "<div class='alert alert-success'>
          Data inserted successfully;
          </div>";
          //session_start();
         // $_SESSION['empid']=$email1;
         // $_SESSION['password']=$encrypted;
          $mail = new PHPMailer(true);

          //$mail->SMTPDebug = 3;                               // Enable verbose debug output
          try{
          //$mail->SMTPDebug = 3;
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'sath.nara2803@gmail.com';                // SMTP username
          $mail->Password = 'tykobngntkmbfaoy';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to

          $mail->setFrom('sath.nara2803@gmail.com', 'prasath');
          $mail->addAddress($email1);   // Add a recipient
          //$mail->addAddress('ellen@example.com');               // Name is optional
          //$mail->addReplyTo('info@example.com', 'Information');
          //$mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');

          //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
          $mail->isHTML(true);                                  // Set email format to HTML

          $mail->Subject = 'Login Credentials';
          $mail->Body    = 'Hi your login credentials were your <br> <b>'.$email1.'</b><br> Password: <b>'.$password.'</b><br> thank you!';
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          $mail->send();
          echo 'Message sent!';
          } catch(Exception $e) {
              echo 'Message not sent: {$mail->ErrorInfo}';
          }
    }
  }
            
                }

              }        
          
        ?>
            <form class="mt-2" method="post" enctype="multipart/form-data">
                <div class="row mt-4">
                    <div class="col-md-10 mt-1">
                        <button type="button" class="btn btn-dark btn-sm">view</button>
                    </div>
                    <div class="col-md-2 mt-1">
                        <a class="btn btn-dark btn-sm" href="attendance.php" role="button">back</a>
                    </div>
                </div>


                <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>ID</b></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="id" name="hr_id">
                </div>
                 <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>Name</b></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name">
                 </div>
                 <div class="form-group mt-1">
                         <label for="exampleInputPassword1"><b>Email</b></label>
                         <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email " name="email">
                 </div>
                 <div class="form-group mt-1">
                         <label for="exampleInputPassword1"><b>Joining Date</b></label>
                         <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Email " name="jdate">
                 </div>
                 <div class="form-group mt-1">
                         <label for="exampleInputPassword1"><b>Phone</b></label>
                         <input type="number" class="form-control" id="exampleInputPassword1" placeholder="number" name="phno">
                 </div>
                 <div>
                         <label for="exampleInputPassword1"><b>Upload</b></label>
                         <input type="file" class="form-control" placeholder="upload" name="my_image">
                 </div>
                 <button type="submit" name="submit" class="btn btn-primary mt-2">Submit</button>
                 <button type="submit" class="btn btn-success mt-2">send Access</button>
            </form>
            <!------php access------>
            <?php
              //if($_SERVER['REQUEST_METHOD']=='POST')
             // {
              //      $email1=$_POST['email'];  
                //    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                  //  $password = substr( str_shuffle( $chars ), 0, 8 );
                    ////$password = '3sc3RLrpd17';
                   // $method = 'aes-256-cbc';
                    
                    // Must be exact 32 chars (256 bit)
                    //$password = substr(hash('sha256', $password, true), 0, 32);
                    //echo "Password:" . $password . "\n";
                    
                    // IV must be exact 16 chars (128 bit)
                    //$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
                    
                    // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
                    //$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));
                    //if($email==""){
                      //echo "<div class='alert alert-danger'>
                        //email should'nt be empty;
                        //</div>";
                   // }
                    //else{
                    //$query1="insert into hr_login(`emp_id`, `password`) values('$email1','$password')";
                    //$result=$conn->query($query1);
                    //if($result){
                    //echo "<div class='alert alert-success'>
                    //Data inserted successfully;
                    //</div>";
                    //session_start();
                   // $_SESSION['empid']=$email1;
                   // $_SESSION['password']=$encrypted;
                    //$mail = new PHPMailer(true);

                    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
                    //try{
                    //$mail->SMTPDebug = 3;
                    //$mail->isSMTP();                                      // Set mailer to use SMTP
                    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    //$mail->SMTPAuth = true;                               // Enable SMTP authentication
                    //$mail->Username = 'sath.nara2803@gmail.com';                // SMTP username
                    //$mail->Password = 'tykobngntkmbfaoy';                           // SMTP password
                    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    //$mail->Port = 587;                                    // TCP port to connect to

                    //$mail->setFrom('sath.nara2803@gmail.com', 'prasath');
                    //$mail->addAddress($email1);   // Add a recipient
                    //$mail->addAddress('ellen@example.com');               // Name is optional
                    //$mail->addReplyTo('info@example.com', 'Information');
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');

                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    //$mail->isHTML(true);                                  // Set email format to HTML

                    //$mail->Subject = 'Login Credentials';
                    //$mail->Body    = 'Hi your login credentials were your <br> <b>'.$email1.'</b><br> Password: <b>'.$password.'</b><br> thank you!';
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    //$mail->send();
                    //echo 'Message sent!';
                    //} catch(Exception $e) {
                      //  echo 'Message not sent: {$mail->ErrorInfo}';
                    //}
              //}
            //}
          //}
        ?>
  
        </div>
        <script>
            const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

            menuBtns.forEach((menuBtn) => {
                menuBtn.addEventListener("click", () => {
                navBar.classList.toggle("open");
                });
            });

            overlay.addEventListener("click", () => {
                navBar.classList.remove("open");
            });
    </script>
</body>
</html>