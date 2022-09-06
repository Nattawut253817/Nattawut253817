<?php
    session_start();
    include_once './../configs/connect.php';

    if(isset($_SESSION['user_id'])){
      $stmt = $conn->prepare("SELECT * FROM users WHERE user_id=?");
      $stmt->execute([$_SESSION['user_id']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
      if($stmt->rowCount() < 1){
          header('Location: index.php');
          exit();
      }
    }//isset
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>How To Create Simple Login Form Design In Bootstrap 5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
    	 <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400&display=swap" rel="stylesheet">

    <style>
        body{ width:100%; }
*{ font-family:"Prompt"!important;color:#333;}

    </style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login-form bg-light mt-4 p-4">
                    
                      <form action="./_edit_regis.php" method="post" enctype="multipart/form-data">
<h4 class="text-center">แก้ไขข้อมูลสมาชิก</h4>
            <div class="mb-2 col-12">
                <label class="form-label title">ชื่อผู้ใช้งาน</label>
                <input name="user_name" type="text" class="form-control" placeholder="กรอกชื่อ" value="<?= $row['user_name'];?>">
            </div>

        
            <div class="mb-2 col-12">
                <label class="form-label title">นามสกุลผู้ใช้งาน</label>
                <input name="user_surname" type="text" class="form-control" placeholder="กรอกนามสกุล" value="<?= $row['user_surname'];?>">
            </div>
            
            <div class="mb-2 col-12">
                <label class="form-label title">ตำแหน่ง</label>
                <input name="user_position" type="text" class="form-control" placeholder="กรอกตำแหน่ง" value="<?= $row['user_position'];?>">
            </div>
            

             <div class="mb-2 col-12">
                <label class="form-label title">หน่วยงาน</label>
                <input name="user_company" type="text" class="form-control" placeholder="กรอกชื่อหน่วยงาน" value="<?= $row['user_company'];?>">
            </div>

        
            <div class="mb-2 col-12">
                <label class="form-label title">โทรศัพท์</label>
                <input name="user_phone" type="text" class="form-control" placeholder="กรอกเบอร์โทรศัพท์" value="<?= $row['user_phone'];?>">
            </div>
            
            <div class="mb-2 col-12">
                <label class="form-label title">อีเมล์</label>
                <input name="user_email" type="text" class="form-control" placeholder="กรอกอีเมล์" value="<?= $row['user_email'];?>">
            </div>

             <div class="mb-2 col-12">
                <label class="form-label title">รหัสผ่าน</label>
                <input name="user_pass" type="text" class="form-control" placeholder="กรอกรหัสผ่าน" value="<?= $row['user_pass'];?>" >
            </div>


            <input type="hidden" name="user_id" value="<?= $row['user_id'];?>">

         
        <button style="min-width:100px;" type="submit" class="btn btn-warning ">อัปเดต</button>

    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">หากคุณยังไม่ลงทะเบียน? <a href="./form_login.php">ลงชื่อเข้าใช้</a></p>
                        <p class="text-center mb-0"><a href="./index.php">หน้าหลัก</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</html>