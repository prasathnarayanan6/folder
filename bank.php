<?php
require "connection.php";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>deduction</title>
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
  background: #fff;
}
nav {
  position: fixed;
  top: 0;
  left: 0;
  height: 53px;
  width: 100%;
  display: flex;
  align-items: center;
  background: #fff;
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
  background-color: #fff;
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
<div class="naviga">
<nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">WELCOME ADMIN</span>
      </div>
      <div class="logo ms-auto">
        <a href="index.php" class="nav-link">
        <i class='bx bx-log-out-circle'></i>
        </a>
        <a href="logout.php" class="nav-link">
        <i class='bx bx-log-in-circle'></i>
        </a>
      </div>
</nav>
</div>

   <!-- <div class="card">
        <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Employee ID</th>
									<th>Deduction</th>
								</tr>
							</thead>
                </table>
        </div>
    </div>-->
    <!----payroll------------------------------------------------------------------------------------------------->
<div class="wrapper container">
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222d32;">

   <!-- <a href="home.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sta. Cecilia System</span>
    </a>-->
  <div class="content-wrapper">

  <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-light">Payroll</h1>-->
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
				<span><b>Deduction : <?php //echo $pay['ref_no'] ?></b></span>
            </div>  
            <!--<div class="box-header with-border">
              <div align="right" style="float: right;"><br>
                <form  method="POST">
                <div class="input-group">
                  <input type="date" name="startmonth" class="form-control"> &nbsp;
                  <span class="input-group-text">
                    To
                  </span> &nbsp;
                  <input type="date" name="endmonth" class="form-control"> &nbsp;
                  <button class="btn btn-dark btn-sm btn-flat" name="apply_date"><i class="fa fa-check"></i> Apply Date</button>&nbsp;
                </div>
                </form>
              </div>
            </div>-->
            <hr>
            <div class="card-body table-responsive">

              <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Bank name</th>
                  <th>Account Number </th>
                  <th>IFSC</th>
                  <th>Branch</th>
                  <!--<th>Total Deduction</th>-->
                 <!-- <th>salary</th>-->
                  <th width="12%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                error_reporting(0);
                ini_set('display_errors', 0);
                ini_set('display_errors', false);

                $s = $_SESSION['start_month'];
                $e = $_SESSION['end_month'];
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $empid = $_POST['emp_id'];
                    $bname = $_POST['bname'];
                    $bno = $_POST['bno'];
                    $ifsc = $_POST['ifsc'];
                    $bb = $_POST['bb'];
                   // $ded = $epf + $pt + $hi + $tds;
                    //$deduction = $_POST['ded'];
                    $sql = "insert into bank(emp_id,bname,bno,ifsc,bbranch) values('$empid', '$bname', '$bno', '$ifsc', '$bb')";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        echo "<div class='alert alert-success'>
                        Data inserted successfully;
                        </div>";
                    }
                }

                //$sql= "select e.*,s.desig, s.salary from emp e , salary s where e.emp_id=s.emp_id";

                //$sql = "SELECT * FROM emp";
                //$result = mysqli_query($conn, $sql);
                //$result = mysqli_query($db, $sql);
                //while($row = mysqli_fetch_array($result))
                //{
                ?>
                <tr>
                <form method="POST" enctype="multipart/form-data">
                  <td><input type="text" class="form-control" name="emp_id"></td>
                  <td><input type="text" class="form-control" name="bname"></td>
                  <td><input type="text" class="form-control" name="bno"></td>
                  <td><input type="text" class="form-control" name="ifsc"></td>
                  <td><input type="text" class="form-control" name="bb"></td>
                  <!--<td><input type="text" class="form-control" name="ded"></td>-->
                  <td>
                    <!--<a href="viewpayslip.php?id=<?php //echo $row['emp_id']?>" class="btn btn-primary">Add</a>-->
                     <button type="submit" class="btn btn-dark btn-sm" name="submit"><i class="fas fa-print"></i>Add Bank</button>
                  </td>
                </form>
                </tr>
                <?php
                //}
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</body>
</html>