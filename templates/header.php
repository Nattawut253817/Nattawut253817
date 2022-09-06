<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <title>ส่งคำร้องเรียน</title>
</head>

<body>
   

        <script>
            const configDatatable = {
                "lengthMenu": [
                    [3, 5, 7, -1],
                    [3, 5, 7, "ทั้งหมด"]
                ],
                "language": {
                    "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "กำลังแสดง หน้า _PAGE_ จาก _PAGES_",
                    "infoEmpty": "ไม่มีข้อมูล",
                    "search": "ค้นหา : "
                },
                "oLanguage": {
                    "oPaginate": {
                        "sFirst": "หน้าแรก", // This is the link to the first page
                        "sPrevious": "หน้าแรก", // This is the link to the previous page
                        "sNext": "หน้าถัดไป", // This is the link to the next page
                        "sLast": "หน้าสุดท้าย" // This is the link to the last page
                    }
                }

            }
        </script>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');

            * {
                font-family: 'Sarabun', sans-serif;
            }
            body {
	            background-color:rgb(255,255,240);
	
	        }
            #container{
	            width:80%;
                margin:0 auto;
                margin-top:30px;
                background:rgba(255, 255, 255, 0.8);
                border: 1px solid #eaeaea;
                border-radius: 2px;
                padding:40px;
                align-items: center;
                

            }
                .title { 
                    font-size:18px;
                    font-weight:600;
                    text-align:left;
                }
                
                .title1 { 
                    font-size:18px;
                    font-weight:600;
                    text-align:left;
                    color:red;
                }

                p {
                    text-align:center;
                    font-weight:500;
                    margin-top:10px;
                    text-decoration: underline ;
                }
                

        </style>