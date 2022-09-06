 <?php 
	
	session_start();
    include_once './../configs/connect.php';
     
		// if ($temp_ques_id == "" || $temp_ques_id != $data['ques_id']) {
		// /echo $data['ques_title'].'<br>';
		// 	$temp_ques_id = $data['ques_id'];
		// } 
		//echo $data['choice_title'].'<br>';
		// $data = $result[0];
          
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
    <link rel="stylesheet" href="https:/cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	 <link href="https:/fonts.googleapis.com/css2?family=Prompt:wght@400&display=swap" rel="stylesheet">
	<style>
		body{ width:100%; }
		   *{ font-family:"Prompt"!important;color:#333;}

		/*start header*/
			#header{ line-height:48px; background-color:#f5f5f5; padding:5px; overflow:hidden; box-shadow: 0 0 5px rgb(0 0 0 / 30%);}
			#header .contain,#container{ width:90%; margin:0 auto;}
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
		<?php 
			if (isset($_GET['id'])) {
			/*answer*/	
			$str = "SELECT a.*,b.*,c.*,a.ques_id as ques_id FROM question a 
			LEFT JOIN answer b ON a.ques_id = b.ques_id 
			LEFT JOIN question_group c ON a.ques_group_id = c.ques_group_id 			
			and c.form_id ='".$_GET['id']."' 
			and user_id= '".$_SESSION['user_id']."'
			ORDER BY a.ques_id ASC";
			$stmt2 = $conn->prepare($str);
			$stmt2->execute();
			$answer = $stmt2->fetchAll();
			/*end-answer*/	
				
			/*question*/	
			$con = "form.form_id = question_group.form_id AND question_group.ques_group_id = question.ques_group_id  AND ";
            $stmt = $conn->prepare("SELECT * FROM question_group , question,form WHERE ".$con . " form.form_id=? ORDER BY question.ques_group_id ASC");
            $stmt->execute([$_GET['id']]);
            $stmt->execute();
            $result = $stmt->fetchAll();
			/*end-question*/	
			
			if (@$_GET['ques_id'] == "") {
				$ques_id = 0;
			}else{ 
			   $ques_id = $_GET['ques_id'];
			}			
			//$nextpage = '?id='.$_GET['id'].'&ques_id='.($ques_id +1); 
			@$data = $result[$ques_id];
		
			{ 
				
		?>
		<h4><?= @$data['form_title'];?> </h4>
		<span class="tag-name">โรงพยาบาลเมืองอุบลราชธานี จังหวัดอุบลราชธานี</span>
		
		<div class="row" style="margin-top:30px;">
			<div class="col-9">
				<p style="padding-top:1px;">
					<br><?= @$data['form_desc'];?> 
				</p>
				
		<form action="_form.php" method="post">
				<table class="table table-bordered  table-striped table-hover">
					<thead>
						<tr>
							<th style="text-align:left;">กิจกรรม</th>
							<th style="text-align:left;"><?= @$data['ques_group_title'];?> </th>
						</tr>			
					</thead>
					<tbody>
						<tr>
							<td>แนวทาง</td>
							<td>
								<?= @$data['ques_title'];?> 						
							</td>
						</tr>
						<tr>
							<td>พิจารณาตามแนวทาง</td>
							<td>
								<?= @$data['ques_desc'];?> 	<br>
							</td>
						</tr>
						<tr>
							<td>เกณฑ์การให้คะแนน	</td>
							<td>
							<?php 
								$choice=explode(',',$answer[$ques_id]['choice_id']);
							
								$st = $conn->prepare("SELECT * FROM choice WHERE ques_id=".@$data['ques_id']);
								@$st->execute();
								$result1 = $st->fetchAll();
								foreach($result1 as $row ) {
								echo '<input type="checkbox" value="'.$row['choice_id'].'" name="choice[]" class="choice" title="'.$row['choice_score'].'"';
								if(in_array($row['choice_id'],$choice)) echo ' checked="checked" ';
								echo '> '.$row['choice_title'].' <br>';

									// echo $row['choice_title'];
								}
								

							?>
							

							</td>
							
						</tr>
						<tr>
							<td>ข้อคิดเห็น/ข้อเสนอแนะ	</td>
							<td>
							<textarea style="width:100%" rows="3" name="comment" placeholder="ข้อคิดเห็น/ข้อเสนอแนะ"></textarea>
							</td>
							
						</tr>
							<tr>
							<td>หลักฐาน	</td>
							<td><input type="file" name="file" ></td>
							
						</tr>						
						<tr>
							<td>คะแนนการประเมิน	</td>
							<td><span id="score"><?php if(@$answer[$ques_id]['ans_score']) echo @$answer[$ques_id]['ans_score']; else echo "0"; ?></span> คะแนน</td>
							
						</tr>						
					</tbody>
				</table>
				<?php }  }
				/*<a href="<?php echo $nextpage; ?>" >*/
				?>


				<div style="text-align:center;">	
					<?php 
					echo  '<input type="hidden" name="id" value="'.$_GET['id'].'">';
					echo  '<input type="hidden" name="ques_id" value="'.$data['ques_id'].'">';
					?>
					<input type="hidden" name="total" id="total" value="<?php echo @$answer[$ques_id]['ans_score'] ?>">
					<button type="submit" class="btn btn-warning">ถัดไป</button>
					<button type="submit" class="btn btn-success" disabled>ส่งแบบประเมิน</button>
				</div>
			</div>
		</form>

			<div class="col-3">
				<table class="table table-bordered" >
					<tr>
						<td colspan="4" style="background-color:#f5f5f5;padding:5px;">ภาพรวมการประเมิน</td>
					</tr>
					<?php 
					
						//print_r($answer);
						
						if(@$answer){
							$i=0;
						$total=0;
							echo '<tr>';
							foreach($answer as $val){
								if($i++%4==0) echo '</tr><tr>';
								echo '<td style="text-align:center;"><a href="?id='.$_GET['id'].'&ques_id='.($val['ques_id']-1).'" class="text-primary"><img src="../assets/images/main/';
								if(!@$val['ans_id']) echo 'no-';
								echo 'check.png" style="width:27px;"><br>ข้อ '.($i).'<br><span style="font-size:14px;">';
								if(@$val['ans_score']) echo ''.$val['ans_score']; else echo "0";
								echo ' Score</span></a></td>';
								$total+= $val['ans_score'];
								
							}
							
							echo '</tr>
							<tr>
								<td colspan="4" style="background-color:#f5f5f5;padding:5px;">รวม: '.$total.' คะแนน</td>
							</tr>
							</table>
							<a href="./form_summary.php?id='.$_GET['id'].'"><button type="button" class="btn btn-primary">ดูสรุปผลการประเมิน</button></a>
							';
						}else{
							echo '
							<tr>
								<td colspan="4" style="background-color:#f5f5f5;padding:5px;">ยังไม่มีการประเมิน</td>
							</tr>
							</table>
							';
						}
					?>
					
                   
										
					
				
			</div>
		</div>
		
	</div>


   </body> 




   </html>
<script>
	$(function(){
		$('.choice').change(function(){
			total=0;
			$('.choice').each(function(index){
	  			if($(this).is(":checked")) {
					total+=parseInt($(this).attr('title'));
				}
	  		});	
			$('#score').text(total);
			$('#total').val(total);
			
		});
	});
</script>
