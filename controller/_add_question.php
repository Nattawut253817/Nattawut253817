<?php 
    session_start();
    include_once './../configs/connect.php';

    $sql = "INSERT INTO question  (
            ques_title,
            ques_desc,
            ques_total_score,
            ques_group_id
        )
        VALUES (
            '" . $_POST['ques_title'] . "',
            '" . $_POST['ques_desc'] . "',
            '" . $_POST['ques_total_score'] . "',
            '" . $_POST['ques_group_id'] . "'
          ) 
    ";

    // echo $sql;
    // exit();

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
                  title: "เพิ่มข้อมูลคำถามสำเร็จ",
                  type: "success",
                  timer: 2000
              }, function() {
                  window.location = "../backend/home.php?act=question"; //หน้าที่ต้องการให้กระโดดไป
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