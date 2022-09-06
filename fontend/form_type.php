<?php 
	session_start();
    include_once './../configs/connect.php';
     if (isset($_GET['id'])) {
			$con = "form.form_id = question_group.form_id AND question_group.ques_group_id = question.ques_group_id AND question.ques_id = choice.ques_id AND ";
            //คิวรี่ข้อมูลสินค้าตามประเภท
            $stmt = $conn->prepare("SELECT * FROM question_group , question, choice, form WHERE ".$con . " form.form_id=?");
            $stmt->execute([$_GET['id']]);
            $stmt->execute();
            $result = $stmt->fetchAll();
            // echo $result;
            // exit();
		// print_r ($result);
	$temp_ques_id = '';

	foreach ($result  as $data) {
		if ($temp_ques_id == "" || $temp_ques_id != $data['ques_id']) {
			echo $data['ques_title'].'<br>';
			$temp_ques_id = $data['ques_id'];
		} 
		  echo $data['choice_title'].'<br>';

	}
			
        }
           //คิวรี่ข้อมูลสินค้าทุกรายการ
            // $stmt = $conn->prepare("SELECT * FROM question_group");
            // $stmt->execute();
            // $result = $stmt->fetchAll();

			
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
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
			<a href=""><div class="main-nav"> คุณ <b class="text-primary"><?= $_SESSION['user_name'].' '.$_SESSION['user_surname'];?> </b><img src="../img/user.png" style="width:20px;"> &nbsp;&nbsp;</div></a>
			<!-- ent login -->
			<a href="form_user.php?id=<?= $_SESSION['user_id'];?>"><div class="main-nav">ข้อมูลส่วนตัว&nbsp;&nbsp;</div></a>
			<a href="index.php"><div class="main-nav">หน้าแรก&nbsp;&nbsp;</div></a>
		</div>
	</div>
	
	<div id="container" >
        
		<h4>ชื่อแบบฟอร์ม form table</h4>
        <div class="row" style="margin-top:30px;">
	<div class="col-9">
		<table class="table table-bordered  table-striped table-hover">
			<thead>
				<tr>
					<th>ด้านต่างๆ</th>
					
				</tr>			
			</thead>
            <tr>
              <?php
             foreach($result as $row) {  
            
            ?>
              
				
				<td><a href="form_detail.php?id_question_group=<?= $row['ques_group_id'] ;?>"><?= $row['ques_group_title'];?></a></td>

				</tr>	
                <?php } ?>		
			</tbody>
		</table>
    </div>
        <div class="col-3">
				<table class="table table-bordered" >
					<tr>
						<td colspan="4" style="background-color:#f5f5f5;padding:5px;">สรุปการประเมิน</td>
					</tr>
					<tr>
						<td style="text-align:center;"><img src="../assets//images//main/check.png" style="width:27px;">  1 </td>
						<td style="text-align:center;"><img src="../assets//images//main/no-check.png" style="width:24px;"> 2 </td>
						<td style="text-align:center;"><img src="../assets//images//main/no-check.png" style="width:24px;"> 3</td>
						<td style="text-align:center;"><img src="../assets//images//main/check.png" style="width:24px;"> 4 </td>
					</tr>
					<tr>
						<td style="text-align:center;"><img src="../assets//images//main/no-check.png" style="width:24px;"> 5 </td>
						<td style="text-align:center;"><img src="" style="width:24px;">  </td>
						<td style="text-align:center;"><img src="" style="width:24px;"> </td>
						<td style="text-align:center;"><img src="" style="width:24px;">  </td>
					</tr>
					
					
					<tr>
						<td colspan="4" style="background-color:#f5f5f5;padding:5px;">คะแนนการประเมิน: 40 คะแนน</td>
					</tr>
				</table>
					<a href="../fontend/print_pdf.php"><button type="button" class="btn btn-primary">ดูสรุปผลการประเมิน</button></a>
		</div>
		
		<ul></ul>
	</div>
    </div>

   </body> 




   </html>
<script>
	$(function() {
	
	});
</script>
