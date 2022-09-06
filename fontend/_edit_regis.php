<?php 
    session_start();
    include_once './../configs/connect.php';

    try {
    $sql = " UPDATE users 
                        SET 
                            user_name = '" . $_POST['user_name'] . "',
                            user_surname = '" . $_POST['user_surname'] . "', 
                            user_position = '" . $_POST['user_position'] . "' , 
                            user_company = '" . $_POST['user_company'] . "' , 
                            user_phone = '" . $_POST['user_phone'] . "' , 
                            user_email = '" . $_POST['user_email'] . "' , 
                            user_pass = '" . $_POST['user_pass'] . "'";
   
    $sql .= " WHERE users.user_id = '" . $_POST['user_id'] . "'";

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
                  title: "แก้ไขข้อมูลสำเร็จ",
                  type: "success",
                  timer: 1000
              }, function() {
                  window.location = "../fontend/index.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../fontend/_user_db.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } //isset

    
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
    $conn = null; //close connect db

    
