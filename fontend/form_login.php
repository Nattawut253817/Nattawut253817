<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
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
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="../controller/_login_db.php" method="post" enctype="multipart/form-data" class="row g-3">
                        <h4 class="text-center">ลงชื่อเข้าใช้</h4>
                        <div class="col-12">
                            <label>E-mail</label>
                            <input type="text" name="user_email" class="form-control" placeholder="กรอกอีเมล์">
                        </div>
                        <div class="col-12">
                            <label>รหัสผ่าน</label>
                            <input type="password" name="user_pass" class="form-control" placeholder="กรอกรหัสผ่าน">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">หากคุณยังไม่ลงทะเบียน? <a href="./form_regis.php">ลงทะเบียน</a></p>
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