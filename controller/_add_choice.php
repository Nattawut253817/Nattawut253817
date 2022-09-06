<?php 
    session_start();
    include_once './../configs/connect.php';

    $sql = "INSERT INTO choice  (
            choice_title,
            choice_score,
            ques_id
        )
        VALUES (
            '" . $_POST['choice_title'] . "',
            '" . $_POST['choice_score'] . "',
            '" . $_POST['ques_id'] . "'
          ) 
    ";

    $conn->exec($sql);

    // print $sql;
    // exit();

    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 
    if($sql){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มตัวเลือกคำถามสำเร็จ",
                  type: "success",
                  timer: 2000
              }, function() {
                  window.location = "../backend/home.php?act=choice"; //หน้าที่ต้องการให้กระโดดไป
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
    } //isset
    $conn = null; //close connect db
    
?>