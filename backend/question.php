<?php
    //คิวรี่ข้อมูลมาแสดงใน select option
    include_once './../configs/connect.php';
    $stmt = $conn->prepare("SELECT* FROM question_group");
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

    <title>แบบฟอร์ม</title>
</head>
<body>

    <div id="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="float:left;"><h3>
                    <h4>เพิ่มแบบฟอร์มคำถาม</h4>
                </div>

                <div style="float:right;"><a href="home.php?act=question" type="button" class="btn btn-primary btn-sm"> กลับหน้าหลัก</a></div>
            </div>
        </div>
        <hr>

        <form action="./../controller/_add_question.php" method="post" enctype="multipart/form-data">

            <div class="mb-4 col-12">
                <label class="form-label title">คำถาม</label>
                <input name="ques_title" type="text" class="form-control" placeholder="กรอกคำถาม" >
            </div>

            <div class="mb-4 col-12 form-floating ">
            <textarea name="ques_desc" class="form-control " placeholder="คำอธิบายคำถาม" style="height: 100px"></textarea>
            <label for="floatingTextarea2">คำอธิบายคำถาม</label>
        </div>
        
            <div class="mb-4 col-12">
                <label class="form-label title">คะแนนรวมคำถาม</label>
                <input name="ques_total_score" type="text" class="form-control" placeholder="กรอกคะแนนรวมแบบฟอร์ม" >
            </div>
            
             <div class="mb-4 col-12">
                <label class="form-label title">รหัสแบบฟอร์ม</label>
                <select name="ques_group_id" type="text" class="form-control" placeholder="เลือกประเภทแบบฟอร์ม" >
                    <option value="">-- เลือกแบบฟอร์ม --</option>
                    <?php foreach ($rs as $row) { ?>
                        <option value="<?php echo $row["ques_group_id"];?>"><?=$row["ques_group_title"] ?></option>
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