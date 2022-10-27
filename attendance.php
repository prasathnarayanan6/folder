<?php 
    include_once "attendancecon.php";   
?>
<?php 
session_start();
require "connection.php";
if(!isset($_SESSION['EmpID']) && !isset($_SESSION['password'])){
    header('location:admin.php');
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

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100%;
  background: #e3f2fd;
}
nav {
  position: fixed;
  top: 0;
  left: 0;
  height: 50px;
  width: 100%;
  display: flex;
  align-items: center;
  background: lightblue;
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
</head>
<body>
<nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">WELCOME ADMIN</span>
        <ul class="navbar-nav">
			<li class="nav-item active">
        		<a class="nav-link text-dark" href="index.php">Home</a>
      		</li>
	    <ul>
      </div>
      <div class="logo ms-auto">
        <a href="logout.php" class="nav-link">
        <i class='bx bx-log-out-circle'></i>
        </a>
      </div>
</nav>
  <div class="table-heading mt-5">
            <center><h2 style="font-weight: bolder;">Attendance</h2><center>
        </div>
        <div class="container mt-4" style="border-radius:5px;">
            <div class="row mt-4">
                <div class="col-md-10 mt-1">
                    <a href="view.php" class="btn btn-dark">view</a>
                </div>
                <div class="col-md-2 mt-1">
                    <a class="btn btn-dark btn-sm" href="add.php" role="button">Add Employee</a></button>
                </div>
            </div>
            <div class="table-responsive"><!---table starts-->
            <form method="post">
                <table class="table table-light table-borderless table-stripped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">EmployeeID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Profile Photo</th>
                            <th scope="col">email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                         $query="SELECT * FROM emp";
                         $result=$conn->query($query);
                         while($show=$result->fetch_assoc()){
                         ?>

                        <tr>
                            <td><?php echo $show["emp_id"]?></td>
                            <td><img src="uploads/<?=$show['emp_file']?>" width="63px" height="45px"></td>
                            <td><?php echo $show["name"]?></td>
                            <td><?php echo $show["email"]?></td>
                            <td><?php echo $show["phone"]?></td>
                            <td>
                                Present<input required type="radio" name="attendance[<?php echo $show['emp_id'] ?>]" value="present">Absent<input required type="radio" name="attendance[<?php echo $show['emp_id']; ?>]" value="absent">
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
            <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $att=$_POST['attendance'];
                    $date=date('d-m-y');

                    $query="SELECT distinct date FROM attendance";
                    $result=$conn->query($query);
                    $b=false;
                    if($result->num_rows>0){
                            while($check=$result->fetch_assoc()){
                                if($date==$check['date']){
                                    $b=true;
                                    echo "<div class='alert alert-success'>
                                    attendance already taken;
                                    </div>";
                                }   
                            }
                    }

                    if(!$b){
                        foreach ($att as $key => $value ){
                            if($value=="present"){
                                $query ="insert into attendance(value, emp_id, date) values('Present','$key','$date')";
                                $insertresult=$conn->query($query);
                            }
                            else{
                                $query ="insert into attendance(value, emp_id, date) values('Absent','$key','$date')";
                                $insertresult=$conn->query($query);
                            }
                        }
                        if($insertresult){
                            echo "<div class='alert alert-success'>
                             attendance Done;
                            </div>"; 
                        }
                    }
                }
            ?>
            </table>
            <input class="btn btn-dark" type="submit" value="Mark ATD">
            </form>
            </div>
        
        </div>
</body>
</html>