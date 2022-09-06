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
                      <form action="./../controller/_add_regis.php" method="post" enctype="multipart/form-data">
<h4 class="text-center">ลงทะเบียน</h4>
            <div class="mb-2 col-12">
                <label class="form-label title">ชื่อผู้ใช้งาน</label>
                <input name="user_name" type="text" class="form-control" placeholder="กรอกชื่อ" >
            </div>

        
            <div class="mb-2 col-12">
                <label class="form-label title">นามสกุลผู้ใช้งาน</label>
                <input name="user_surname" type="text" class="form-control" placeholder="กรอกนามสกุล" >
            </div>
            
            <div class="mb-2 col-12">
                <label class="form-label title">ตำแหน่ง</label>
                <input name="user_position" type="text" class="form-control" placeholder="กรอกตำแหน่ง" >
            </div>

             <div class="mb-2 col-12">
                <label class="form-label title">หน่วยงาน</label>
                <input name="user_company" type="text" class="form-control" placeholder="กรอกชื่อหน่วยงาน" >
            </div>

        
            <div class="mb-2 col-12">
                <label class="form-label title">โทรศัพท์</label>
                <input name="user_phone" type="text" class="form-control" placeholder="กรอกเบอร์โทรศัพท์" >
            </div>
            
            <div class="mb-2 col-12">
                <label class="form-label title">อีเมล์</label>
                <input name="user_email" type="text" class="form-control" placeholder="กรอกอีเมล์" >
            </div>

             <div class="mb-2 col-12">
                <label class="form-label title">รหัสผ่าน</label>
                <input name="user_pass" type="password" class="form-control" placeholder="กรอกรหัสผ่าน" >
            </div>


             
         
        <button style="min-width:100px;" type="submit" class="btn btn-success ">บันทึก</button>

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