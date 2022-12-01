<?php 
session_start();
//echo $_GET['id'];
require "connection.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						    <span><b>Payroll : <?php //echo $pay['ref_no'] ?></b></span>
							<a href="deduction.php" class="btn btn-primary btn-sm btn-block col-md-2 float-right" type="button">Add Deduction</a>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
							<p>Payroll Range: <b><?php //echo date("M d, Y",strtotime($pay['date_from'])). " - ".date("M d, Y",strtotime($pay['date_to'])) ?></b></p>
							<p>Payroll Type: <b><?php //echo $pt[$pay['type']] ?></b></p>
							<button class="btn btn-success btn-sm btn-block col-md-2 float-right" type="button" id="print_btn"><span class="fa fa-print"></span> Print</button>
							</div>
						</div>
						<hr>
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Date</th>
									<th>Employee ID</th>
									<th>Designation</th>
									<th>Salary</th>
									<th>Deduction</th>
									<!--<th></th>
									<th></th>-->
									<th>Net</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								    require "connection.php";
									
									if(isset($_GET['id'])){
										$id = $_GET['id'];
									$sql= "select s.desig, s.salary,d.date,d.deduction from salary s, deduction d where e.emp_id='$id' AND e.emp_id = s.emp_id AND e.emp_id = d.emp_id";
									$query=mysqli_query($conn, $sql);
$i =0;
									//$query=mysqli_query($conn, "select * from salary where emp_id='$id'");
									//$payroll="SELECT * FROM emp WHERE emp_id='$id'";
									//$result=$conn->query($payroll);
									while($row=mysqli_fetch_array($query)){
										echo $i=$i+1;
								?>
							
								<tr>
									
									<td><?php echo $row['date'] ?></td>
									<td><?php echo $row['emp_id'] ?></td>
									<td><?php echo $row['desig'] ?></td>
									<td><?php echo $row['salary'] ?></td>
									<!--<td><?php// echo $row[''] ?></td>
									<td><?php //echo $row['phone'] ?></td>-->
									<td><?php echo number_format($row['deduction'],2) ?></td>
									<td><?php echo number_format($row['salary']-$row['deduction'],2) ?></td>
									<td>
										<center>
											<a href="payslip.php?id=<?php echo $row['emp_id']?> && date=<?php echo $row['date']?>" class="btn btn-primary">view</a.
										</center>
									</td>
								</tr>
								<?php
									}}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
			
		
		
	<script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

			

			$('#print_btn').click(function(){
				var nw = window.open("print_payroll.php?id=<?php echo $_GET['id'] ?>","_blank","height=500,width=800")
				setTimeout(function(){
					nw.print()
					setTimeout(function(){
						nw.close()
						},500)
				},1000)
			})

			
			
			$('.view_payroll').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Employee Payslip","view_payslip.php?id="+$id,"large")
				
			});
			
			$('#new_payroll_btn').click(function(){
				start_load()
				$.ajax({
					url:'ajax.php?action=calculate_payroll',
					method:"POST",
					data:{id:'<?php echo $_GET['id'] ?>'},
					error:err=>console.log(err),
					success:function(resp){
							if(resp == 1){
								alert_toast("Payroll successfully computed","success");
									setTimeout(function(){
									location.reload();

								},1000)
							}
						}
				})
			})
		});
		function remove_payroll(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_payroll',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Employee's data successfully deleted","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
					}
			})
		}
	</script>

</body>
</html>