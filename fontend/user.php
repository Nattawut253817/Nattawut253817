<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>

    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');

    body {
        background: linear-gradient(to bottom, white, PeachPuff);
        color: black;
        font-family: 'Sarabun', sans-serif;

        }
    #container {
        width:100%;
        margin:0 auto;
        margin-top:15px;
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 2px;
        padding:40px;
    }
    .title{ text-align:right;}
    .input{ padding:5px;}
    input[type="text"],select{ width:100%; padding:5px; border:solid 1px #ccc;}
</style>

    <title>แบบฟอร์ม</title>
</head>
<body>

    <div id="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="float:left;">
                    <h4>ลงทะเบียน</h4>
                </div>

                <div style="float:right;"><a href="./form_index.php" type="button" class="btn btn-primary btn-sm"> กลับหน้าหลัก</a></div>
            </div>
        </div>
        <hr>

        <form action="./../controller/_add_regis.php" method="post" enctype="multipart/form-data">

            <div class="mb-4 col-12">
                <label class="form-label title">ชื่อผู้ใช้งาน</label>
                <input name="user_name" type="text" class="form-control" placeholder="กรอกชื่อแบบฟอร์ม" >
            </div>

        
            <div class="mb-4 col-12">
                <label class="form-label title">นามสกุลผู้ใช้งาน</label>
                <input name="user_surname" type="text" class="form-control" placeholder="กรอกคะแนนรวมแบบฟอร์ม" >
            </div>
            
            <div class="mb-4 col-12">
                <label class="form-label title">ตำแหน่ง</label>
                <input name="user_position" type="text" class="form-control" placeholder="กรอกปีงประมาณ" >
            </div>

             <div class="mb-4 col-12">
                <label class="form-label title">หน่วยงาน</label>
                <input name="user_company" type="text" class="form-control" placeholder="กรอกชื่อแบบฟอร์ม" >
            </div>

        
            <div class="mb-4 col-12">
                <label class="form-label title">โทรศัพท์</label>
                <input name="user_phone" type="text" class="form-control" placeholder="กรอกคะแนนรวมแบบฟอร์ม" >
            </div>
            
            <div class="mb-4 col-12">
                <label class="form-label title">อีเมล์</label>
                <input name="user_email" type="text" class="form-control" placeholder="กรอกปีงประมาณ" >
            </div>


             
            <div class="mb-4 col-12 w-50 ">
                <label class="form-label title">ระดับผู้ใช้งาน</label>
                <div class="row">
                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="user_rank" value="1">
                        <label class="form-check-label">
                            สคร.
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="user_rank" value="2" >
                        <label class="form-check-label">
                            สสจ.
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="user_rank" value="3" >
                        <label class="form-check-label">
                            รพ.
                        </label>
                    </div>
                </div>
            </div>
            
        <button style="min-width:100px;" type="submit" class="btn btn-success ">บันทึก</button>

    </form>
</div>
    
<?php include_once '../templates/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>