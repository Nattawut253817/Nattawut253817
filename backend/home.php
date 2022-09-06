<?php 
	session_start();
     echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
//print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
// if(empty($_SESSION['user_rank'] == 1)){
//             echo '<script>
//                 setTimeout(function() {
//                 swal({
//                 title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้",
//                 type: "error",
//                 timer: 2000
//                 }, function() {
//                 window.location = "../fontend/index.php"; //หน้าที่ต้องการให้กระโดดไป
//                 });
//                 }, 1000);
//                 </script>';
//             exit();
// }
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- sweet alert -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');

        .list-group {
            font-size:14px;
            font-weight: bold;
        }
    </style>    
    
    <title>ระบบจัดการแบบประเมิน</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="alert alert-warning" role="alert"><h3><center>ระบบจัดการฟอร์มแบบประเมิน</center></h3></div>
            <div class="row">
                 <div class="col-md-2">
                    <div class="alert alert-info" role="alert">Menu</div>

                        <div class="list-group">
                            <a href="../fontend/index.php" class="list-group-item ">หน้าหลัก</a>
                            <a href="home.php?act=form" class="list-group-item ">จัดการแบบฟอร์ม</a>
                            <a href="home.php?act=ques" class="list-group-item">จัดการกลุ่มคำถาม</a>
                            <a href="home.php?act=question" class="list-group-item">จัดการคำถาม</a>
                            <a href="home.php?act=choice" class="list-group-item">จัดการตัวเลือกคำถาม</a>
                            <a href="home.php?act=user" class="list-group-item">จัดการผู้ใช้งาน</a>
                            <a href="home.php?act=ans" class="list-group-item">การตอบแบบประเมิน</a>
                        </div>
                    </div>

                <div class="col-md-10">
                    <div class="alert alert-success" role="alert">รายละเอียด</div>

<?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $act = $_GET['act'];

    if ($act == 'form')  {
        include('form_list.php');
    }
        elseif ($act == 'ques') {
            include('question_group_list.php');
        }
            elseif ($act == 'add_q') {
                    include('question_group.php');
            }
                elseif ($act == 'question') {
                    include('question_list.php');
                }

                    elseif ($act == 'add_ques') {
                        include('question.php');
                    }

                        elseif ($act == 'choice') {
                            include('choice_list.php');
                        }

                            elseif ($act == 'add_choice') {
                                include('choice.php');
                            }

                                elseif ($act == 'user') {
                                    include('user_list.php');
                                 }

                                    elseif ($act == 'add_user') {
                                        include('user.php');
                                    }

                                        elseif ($act == 'ans') {
                                            include('ans.php');
                                        }
                                            else {
                                                include('form.php');
                                            }
?>
              </div>
        </div>     
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>