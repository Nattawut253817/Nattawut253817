  <?php 
	
	session_start();
    include_once './../configs/connect.php';
          
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
	th{text-align:center; color:#fff;vertical-align: top!important;}
	a{color:#008000}
	/*:not(:first-child)
	td{ text-align:center;}*/
	input[type="text"],select,textarea{	border:solid 1px #ddd;	padding:10px 5px; width:100%;}

	.tag-name{ border-radius:5px; background-color:#008000;color:#fff; padding:3px 5px;}

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
		<h4>เกณฑ์การประเมินการดำเนินงานด้านการป้องกันและควบคุมการติดเชื้อในโรงพยาบาล ปีงบประมาณ 2565</h4>
		<span class="tag-name">โรงพยาบาลเมืองอุบลราชธานี จังหวัดอุบลราชธานี</span>
		<div style="float:right">
			<a href="<?php echo 'form_detail.php?id='.$_GET['id'];?>"><button type="button" class="btn btn-warning">ดูแบบประเมิน</button></a> 
			<a href="./print_pdf.php?id=<?=$_SESSION['user_id'];?>"><button type="button" class="btn btn-primary" target="_blank" >ดาวน์โหลดผลการประเมิน</button></a>
			
		</div>
		<div class="row" style="margin-top:30px;">
		<?php
					
					/*answer*/	
					$str = "SELECT a.*,b.*,c.*,d.*,a.ques_id as ques_id FROM 
					question a 					
					LEFT JOIN question_group c ON a.ques_group_id = c.ques_group_id 
					LEFT JOIN form d ON c.form_id = d.form_id 
					LEFT JOIN answer b ON a.ques_id = b.ques_id 					
					and c.form_id ='".$_GET['id']."' 
					and user_id= '".$_SESSION['user_id']."'
					ORDER BY a.ques_id ASC";
					$stmt2 = $conn->prepare($str);
					$stmt2->execute();
					$answer = $stmt2->fetchAll();
					/*end-answer*/
					
					?>
				<table class="table table-bordered  table-striped table-hover">
					<thead>
						<tr>
							<th>กิจกรรมที่ดำเนินการและเกณฑ์การให้คะแนน</th>
							<th>คะแนนเต็ม</th>
							<th>คะแนนที่ได้</th>
						</tr>			
					</thead>
					<tbody>
					<?php
					$tmp_ques_group;
					$g=0;
					$total=$score=0;
					foreach($answer as $val){
						//echo $val['ques_group_title'].'<br>'.$val['ques_title'].'<br><br><br>';
						if(@$tmp_ques_group=='' || @$tmp_ques_group!=$val['ques_group_id']){
							echo '</tr>
								<td><b>'.$val['ques_group_title'].'</b></td>
								<td style="text-align:center;"></td>
								<td></td>
							</tr>';
							$g++;
							$tmp_ques_group=$val['ques_group_id'];
							$sg=1;
						}
						echo '
						</tr>
							<td><a href="form_detail.php?id='.$_GET['id'].'&ques_id='.$val['ques_id'].'" style="color:#333!important;">'.$g.'.'.($sg++).' '.$val['ques_title'].'</a></td>
							<td style="text-align:center;">'.$val['ques_total_score'].'</td>
							<td style="text-align:center;">';
							if(@$val['ans_score'])echo @$val['ans_score'];
							else echo '0';
							echo '</td>
						</tr>
						';
						$total+=$val['ques_total_score'];
						$score+=$val['ans_score'];
					}
					
					$sc=number_format(($score/$total*100),2,".",",");
					
					?>				
						
					</tbody>
					<tfoot>
						<tr>
							<td style="text-align:center;"><b>รวม</b></td>
							<td style="text-align:center;"><b><?php echo $total; ?></b></td>
							<td style="text-align:center;"><?php echo $score; ?></td>
						</tr>
						<tr>
							<td style="text-align:center;"><b>เกณฑ์ ผ่านการประเมิน <?php echo $answer[0]['form_score_pass'];?>%</b></td>
							<td style="text-align:center;"><b>100%</b></td>
							<td style="text-align:center;
							<?php if($sc>=$answer[0]['form_score_pass']){ echo 'background-color:#008000;';} else echo 'background-color:#C70039;'; ?>">
								<b style="color:#fff;"><?php echo $sc; ?>%</b>
							</td>
						</tr>
					</tfoot>
				</table>
					หมายเหตุ เกณฑ์ผ่านการประเมินการดำเนินงานป้องกันควบคุมโรคติดเชื้อในโรงพยาบาล คือ<br>
					ก. ผ่าน = มีผลรวมของคะแนนมากกว่าหรือเท่ากับ  <?php echo ($answer[0]['form_score_pass']*$total/100).' คะแนน ('.$answer[0]['form_score_pass'].'%)';?><br>
					ข. ไม่ผ่าน = มีผลรวมของคะแนนน้อยกว่า <?php echo ($answer[0]['form_score_pass']*$total/100).' คะแนน '; ?>
			
		</div>
		
	</div>


   </body> 




   </html>
<script>
	$(function(){
	
	});
</script>
