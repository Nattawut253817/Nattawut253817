<?php
    session_start();
    include_once './../configs/connect.php';
 
 echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


        if($_POST['user_email'] != "" || $_POST['user_pass'] != ""){
            $user_email = $_POST['user_email'];
            $user_pass = $_POST['user_pass'];
            $sql = "SELECT * FROM `users` WHERE `user_email`=? AND `user_pass`=? ";
            $query = $conn->prepare($sql);
            $query->execute(array($user_email,$user_pass));
            $row = $query->rowCount();
            $fetch = $query->fetch();
            //สร้างตัวแปร session
                $_SESSION['user_id'] = $fetch['user_id'];
                $_SESSION['user_name'] = $fetch['user_name'];
                $_SESSION['user_surname'] = $fetch['user_surname'];
                $_SESSION['user_email'] = $fetch['user_email'];
                $_SESSION['user_pass'] = $fetch['user_pass'];

                
            if($row > 0) {
                 echo '<script>
                            setTimeout(function() {
                            swal({
                            title: "เข้าสู่ระบบสำเร็จ  ",
                            type: "success",
                            timer: 1000
                                }, function() {
                                    window.location = "../fontend/index.php"; //หน้าที่ต้องการให้กระโดดไป
                                });
                                }, 1000);
                        </script>';
            } else{
               echo '<script>
                        setTimeout(function() {
                        swal({
                        title: "เกิดข้อผิดพลาด",
                        type: "error",
                        timer: 1000
                            }, function() {
                                 window.location = "../fontend/form_login.php"; //หน้าที่ต้องการให้กระโดดไป
                            });
                            }, 1000);
                    </script>';
            }
        } 

        $conn = null; //close connect db

?>