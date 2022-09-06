<?php 
 session_start();
	echo '
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

		if(empty($_SESSION['user_name'] )){
            echo '<script>
                	window.location = "../fontend/form_login.php"; //หน้าที่ต้องการให้กระโดดไป
                </script>';
        	exit();
		}
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>สำนักงานป้องกันควบคุมโรคที่ 10 จังหวัดอุบลราชธานี</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400&display=swap" rel="stylesheet">

<style>
	body{ width:100%; }
	   *{ font-family:"Prompt"!important;color:#333;}

/*start header*/
	#header{ line-height:48px; background-color:#f5f5f5; padding:5px; overflow:hidden; box-shadow: 0 0 5px rgb(0 0 0 / 30%);}
	#header .contain,#container{ width:80%; margin:0 auto;}
	#logo{float:left;}
	#logo img{width:48px;}
	.main-nav{float:right;}
/*end header*/

/*start container*/
	#container{ padding:20px 0;}
/*end container*/

	table{width:100%;}
	thead{background-color:#008000}
	th{text-align:center; color:#fff;}
	a{color:#008000}
	td:not(:first-child){ text-align:center;}
	input[type="text"],select{	border:solid 1px #ddd;	padding:10px 5px; width:100%;}

	@media only screen and (max-width: 500px) {
	}
	

</style>
  </head> 
   <body > 
	<div id="header" >
		<div class="contain">
			<a href="index.php"><div id="logo" ><img src="../assets//images//main/logo.png">&nbsp;ชื่อแบบฟอร์ม</div></a>
			<!-- start login -->
			<a href="../controller/./_logout_db.php"><div class="main-nav text-danger" onclick="return confirm('ยืนยันการออกจากระบบ');" >ออกจากระบบ <img src="../img/logout.png" style="width:20px;"></div></a>
			<a href="_user_db.php?id=<?= $_SESSION['user_id'];?>"><div class="main-nav"> คุณ <b class="text-primary"><?= $_SESSION['user_name'].' '.$_SESSION['user_surname'];?> </b><img src="../img/user.png" style="width:20px;"> &nbsp;&nbsp;</div></a>
			<!-- ent login -->
			<a href="index.php"><div class="main-nav">หน้าแรก&nbsp;&nbsp;</div></a>
		</div>
	</div>
	
	<div id="container" >
		<h4>ชื่อแบบฟอร์ม</h4>
		<div class="row" style="padding:20px 0;">
			<div class="col-lg-3">
				<select>
					<option>ปีงบประมาณ</option>
					<option>ปี 2565</option>
					<option>ปี 2564</option>
					<option>ปี 2563</option>
				</select>
			</div>

			<div class="col-lg-3">
				<select>
					<option>เดือน</option>
				</select>
			</div>

			<div class="col-lg-3">
				<input type="text" placeholder="ระบุชื่อแบบฟอร์ม...">
			</div>

			<div class="col-lg-3">
				<button type="button" class="btn btn-primary" style="width:100%">ค้นหาแบบฟอร์ม</button>
			</div>

		</div>
		<table class="table table-bordered  table-striped table-hover">
			<thead>
				<tr>
					<th>ชื่อแบบประเมิน</th>
					<th>ปีงบประมาณ</th>
					<th>ช่วงเวลาประเมิน</th>
					<th>ผลการประเมิน</th>
				</tr>			
			</thead>
			<tbody>
				<tr>
					<?php
                        //คิวรี่ข้อมูลมาแสดงในตาราง
                        include_once './../configs/connect.php';
                        $stmt = $conn->prepare("SELECT * FROM form");
                        $stmt->execute();
                        $rs = $stmt->fetchAll();
                        
						foreach($rs as $row) {  ?>
							<td><a href="form_detail.php?id=<?= $row['form_id'];?>"><?= $row['form_title'];?></a></td>
							<td><?= $row['form_year'];?></td>
							<td>1 ก.ค. - 20 ก.ค. 65</td>
							<td><img src="../assets//images//main/check.png" style="width:24px;"> ผ่านการประเมิน</td>
				</tr>
				  <?php } ?>			
			</tbody>
		</table>
		<ul></ul>
	</div>
</body> 
</html>
<script>
	$(function() {
	
	});
</script>
