<?php 
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
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
  background-color: white;
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
              <a href="salary.php" class="nav-link">
                <i class="bx bx-message-rounded icon"></i>
                <span class="link">salary</span>
              </a>
            </li>
            <li class="list">
              <a href="department.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">department</span>
              </a>
            </li>
            <li class="list">
              <a href="query.php" class="nav-link">
                <i class='bx bx-envelope icon' ></i>
                <span class="link">Query</span>
              </a>
            </li>
            <li class="list">
              <a href="files.php" class="nav-link">
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
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
                $empid=$_POST['emp_id'];
                // $desig=$_POST['desig'];
                $ba=$_POST['ba'];
                $da=$_POST['da'];
                $hra=$_POST['hra'];
                $ca=$_POST['ca'];
                $ma=$_POST['ma'];
                $gs=$_POST['gs'];
                $sa=$_POST['sa'];
                $salary=$_POST['salary'];
                $date=$_POST['date'];

                $query = "insert into salary(emp_id,ba,da,hra,ca,ma,gs,sa,salary,date) values('$empid','$da', $hra,'$ca','$ma','$gs','$sa','$salary','$date')";
                $result=$conn->query($query);
                if($result){
                   echo "<div class='alert alert-success'>
                    Data inserted successfully
                    </div>";
                }
                else{
                  echo "<div class='alert alert-danger'>
                  Data not inserted
                  </div>";
                }
            }               
?>
<div class="container mt-5">
<form enctype="multipart/form-data" class="mt5" method="post">
                <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>ID</b></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="id" name="emp_id">
                </div>
                 <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>Basic Salary</b></label>
                        <input type="text" class="form-control" placeholder="Basic Salary" name="ba">
                 </div>
                 <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>Dearness allowances</b></label>
                        <input type="text" class="form-control"  placeholder="Dearness Allowances" name="da">
                 </div>
                 <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>House Rent Allowances</b></label>
                        <input type="text" class="form-control"  placeholder="House Rent Allowances" name="hra">
                 </div>
                 <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>Conveyance Allowances</b></label>
                        <input type="text" class="form-control"  placeholder="Conveyance Allowances" name="ca">
                 </div>
                 <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>Medical Allowances</b></label>
                        <input type="text" class="form-control" placeholder="Medical Allowances" name="ma">
                 </div>
                 <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>Gross Salary</b></label>
                        <input type="text" class="form-control" placeholder="Gross Salary" name="gs">
                 </div>

                 <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:600px;"><b>Special Allowances</b></label>
                        <input type="text" class="form-control" placeholder="Special allowances" name="sa">
                 </div>

                 <div class="form-group mt-1">
                         <label for="exampleInputPassword1"><b>salary</b></label>
                         <input type="text" class="form-control" id="exampleInputPassword1" placeholder="salary" name="salary">
                 </div>

                 

                 <div class="form-group mt-1">
                         <label for="exampleInputPassword1"><b>salary Date</b></label>
                         <input type="date" class="form-control" id="exampleInputPassword1" placeholder="salary" name="date">
                 </div>
                 <button type="submit" name="submit" class="btn btn-primary mt-2">Submit</button>
            
</form>
</div>
<!--script---->
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