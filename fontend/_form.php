 <?php session_start();
    include_once './../configs/connect.php';

    // echo $_POST['comment'];
    // exit();
    
	$sql="select ans_id,ques_id from answer where ques_id='".$_POST['ques_id']."' and user_id='".$_SESSION['user_id']."'" ;		  
	$st = $conn->prepare($sql );
	$st->execute();
	$result = $st->fetchAll();
	$choice = implode(',', $_POST['choice'] );
	if(@ $_POST['choice'] ){
		if(!$result){ /*new*/		
			$sql="INSERT INTO answer ( choice_id, ques_id, user_id,ans_score) 
			  VALUES ('".$choice."', ".$_POST['ques_id']." ,".$_SESSION['user_id'].", ".$_POST['total'].")" ;
		}else{	
			$sql="update answer set choice_id='".$choice."',ans_score='".$_POST['total']."' where ans_id ='".$result[0]['ans_id']."'; "; 	
			
		}
	}elseif($result){
		$sql="delete from answer where ans_id ='".$result[0]['ans_id']."'; "; 
	}

		  
	$st = $conn->prepare($sql );
	$st->execute();
	
	echo '<script>
	window.location = "./form_detail.php?id='.$_POST['id'].'&ques_id='.$_POST['ques_id'].'";
	</script>
	';
	
	
	
	
	
	
	
	
	
	
	
	
	
    // echo $sql;

   /*  echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
        
    if($sql){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลเรียบร้อย",
                  type: "success",
                  timer: 1000
              }, function() {
                  window.location = "./form_detail.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "../backend/home.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } //isset*/
   
 ?>