<?php 
require('fpdf/fpdf.php'); 
if(!isset($_SESSION['user_id'])){     
header("Location: index.php"); }
else 
{
	$user_id = $_SESSION['user_id']  ;} 
	
$pdf = new FPDF(); $pdf->AddPage(); 
$pdf->SetFont('Arial','B',16);  
$pdf->Cell(190,10,'Advocate Diary Report',1,1,'C');  $pdf->Output(); 
?>