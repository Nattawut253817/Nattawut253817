<?php 
    session_start();
    include_once './../configs/connect.php';

    $sql = "INSERT INTO question_group  (
            ques_group_title,
            form_id
        )
        VALUES (
            '" . $_POST['ques_group_title'] . "',
            '" . $_POST['form_id'] . "'
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
                  title: "เพิ่มข้อมูลกลุ่มคำถามสำเร็จ",
                  type: "success",
                  timer: 2000
              }, function() {
                  window.location = "../backend/home.php?act=ques"; //หน้าที่ต้องการให้กระโดดไป
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