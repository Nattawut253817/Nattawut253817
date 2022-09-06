<?php 
  
    //คิวรี่ข้อมูลมาแสดงใน select option
    include_once './../configs/connect.php';
    $stmt = $conn->prepare("SELECT* FROM form");
    $stmt->execute();
    $rs = $stmt->fetchAll();

?>

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
        background-color:#f1f3f6;
        font-family: 'Sarabun', sans-serif;

        }
    #container {
        width:100%;
        margin:0 auto;
        margin-top:40px;
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 2px;
        padding:40px;
    }
    .title{ text-align:right;}
    .input{ padding:5px;}
    input[type="text"],select{ width:100%; padding:5px; border:solid 1px #ccc;}
</style>

    <title>กลุ่มคำถาม</title>
</head>
<body>

    <div id="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="float:left;"><h3>
                    <h4>เพิ่มกลุ่มคำถาม</h4>
                </div>

                <div style="float:right;"><a href="home.php?act=ques" type="button" class="btn btn-primary btn-sm"> กลับหน้าหลัก</a></div>
            </div>
        </div>
        <hr>

        <form action="../controller/_add_question_group.php" method="post" enctype="multipart/form-data">

            <div class="mb-4 col-12">
                <label class="form-label title">ชื่อกลุ่มคำถาม</label>
                <input name="ques_group_title" type="text" class="form-control" placeholder="กรอกชื่อกลุ่มคำถาม" >
            </div>

            
            <div class="mb-4 col-12">
                <label class="form-label title">รหัสแบบฟอร์ม</label>
                <select name="form_id" type="text" class="form-control" placeholder="เลือกประเภทแบบฟอร์ม" >
                    <option value="">-- เลือกแบบฟอร์ม --</option>
                    <?php foreach ($rs as $row) { ?>
                        <option value="<?php echo $row["form_id"];?>"><?=$row["form_title"] ?></option>
                    <?php } ?>
                </select>
            </div>

        <button style="min-width:100px;" type="submit" class="btn btn-success ">บันทึก</button>

    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>
