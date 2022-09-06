<?php 
    include_once './../configs/connect.php';
    include_once '../fpdf/fpdf.php';
    session_start();

    /*answer*/	
	$str = "SELECT a.*,b.*,c.*,d.*,a.ques_id as ques_id FROM question a 					
	    LEFT JOIN question_group c ON a.ques_group_id = c.ques_group_id 
		LEFT JOIN form d ON c.form_id = d.form_id 
		LEFT JOIN answer b ON a.ques_id = b.ques_id 					
		and c.form_id ='".$_GET['id']."' 
		and user_id= '".$_SESSION['user_id']."'
		ORDER BY a.ques_id ASC";
		$stmt2 = $conn->prepare($str);
		$stmt2->execute();
		$answer = $stmt2->fetchAll();
	/*end-answer*/
    					
// echo $val['ques_group_title'];
// exit();


    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->AddFont('sarabun','B','THSarabunB.php');
    $pdf->AddFont('sarabun','','THSarabun.php');


    $pdf->SetFont('sarabun','B',16);
    $pdf->SetXY(9,11);
    $pdf->Cell(0,15,iconv('utf-8','cp874','ผลการประเมินการดำเนินงานด้านการป้องกันและควบคุมการติดเชื้อในโรงพยาบาล ปีงบประมาณ 2565'),0,1,'C');
    


foreach($answer as $val){


// column1
    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(150,10,iconv('utf-8','cp874','กิจกรรมที่ดำเนินการและเกณฑ์การให้คะแนน'),1,0,'C');

    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,10,iconv('utf-8','cp874','คะแนนเต็ม'),1,0,'C');


    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,10,iconv('utf-8','cp874','คะแนนที่ได้'),1,1,'C');


// column2
    $pdf->SetFont('sarabun','B',13);
    $pdf->SetXY(10,36);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(190,10,iconv('utf-8','cp874',$val['ques_group_title']),1,1,'C');


// column3
    $tmp_ques_group;
    $g=0;
    $total=$score=0;
    

    $pdf->SetFont('sarabun','',13);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(150,10,iconv('utf-8','cp874',$val['ques_title']),1,0,'C');

    $g++;
    $tmp_ques_group=$val['ques_group_id'];
    $sg=1;


    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,10,iconv('utf-8','cp874',$val['ques_total_score']),1,0,'C');

    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,10,iconv('utf-8','cp874',$val['ans_score']),1,1,'C');


// column4
    $total+=$val['ques_total_score'];
    $score+=$val['ans_score'];

    $sc=number_format(($score/$total*100),2,".",",");

    $pdf->SetFont('sarabun','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(150,10,iconv('utf-8','cp874','รวม'),1,0,'C');

    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,10,iconv('utf-8','cp874',''),1,0,'C');

    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,10,iconv('utf-8','cp874',$sc),1,1,'C');


// column5
    $pdf->SetFont('sarabun','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(150,10,iconv('utf-8','cp874','เกณฑ์ ผ่านการประเมิน 80%'),1,0,'C');

    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,10,iconv('utf-8','cp874','100%'),1,0,'C');

    $pdf->SetFont('sarabun','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,10,iconv('utf-8','cp874',$sc),1,1,'C');



    $pdf->Output();

}
?>