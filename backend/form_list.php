<?php 
	session_start(); 	
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');

    body {
        background-color:#f1f3f6;
        font-family: 'Sarabun', sans-serif;
        }

    #container{

        width:100%;
        margin:0 auto;
        margin-top:15px;
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 2px;
        padding:40px;
        font-size:10px;

    }

</style>

<div id="container">
<div style="float:left;"><h3>ข้อมูลแบบฟอร์ม</h3></div>
<div style="float:right;"><a href="home.php?act=add_f" type="button" class="btn btn-primary btn-sm">เพิ่มแบบฟอร์ม</a></div>
 <table class="table table-hover">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อแบบฟอร์ม</th>
                    <th>คำอธิบายแบบฟอร์ม</th>
                    <th width="10%">คะแนนรวม</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead> 
            <tbody>
			<!-- การวนลูปดึงข้อมูลและค่าต่างๆ -->
            <?php
                //คิวรี่ข้อมูลมาแสดงในตาราง
                include_once './../configs/connect.php';
                $stmt = $conn->prepare("SELECT* FROM form");
                $stmt->execute();
                $rs = $stmt->fetchAll();

                    foreach($rs as $row) { ?>
                        <tr>
                            <td><?= $row['form_id'];?></td>
                            <td><?= $row['form_title'];?></td>
                            <td><?= $row['form_desc'];?></td>
                            <td><?= $row['form_total_score'];?></td>
                            <td><a href="form_edit.php?id=<?= $row['form_id'];?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                            <td><a href="_del_form.php?id=<?= $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
</div>