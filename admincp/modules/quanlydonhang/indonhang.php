<?php
	
	require('../../../tfdpf/tfpdf.php');
	require('../../config/config.php');

	$pdf = new tFPDF();
	$pdf->AddPage();
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',14);
	$pdf->SetFillColor(193,229,252);

	$code=$_GET['code'];
	$sql_lietke_dh="SELECT * FROM tbl_cart_detail,tbl_sanpham WHERE tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_detail.code_cart='$code' ORDER BY tbl_cart_detail.id_cart_details DESC";
	$query_lietke_dh=mysqli_query($conn,$sql_lietke_dh);
	$pdf->Write(10,'Đơn hàng của bạn gồm có:');
	$pdf->Ln(10);

	$width_cell=array(5,35,80,20,30,40);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Tổng tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
	while($row = mysqli_fetch_array($query_lietke_dh)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['code_cart'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['tensanpham'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['soluongmua'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['gia']),1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format($row['soluongmua']*$row['gia']),1,1,'C',$fill);
	$fill = !$fill;

	}
	$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
	$pdf->Ln(10);

	// Load a UTF-8 string from a file and print it
	/*$txt = file_get_contents('HelloWorld.txt');
	$pdf->Write(8,$txt);
*/
	// Select a standard font (uses windows-1252)
	// $pdf->SetFont('Arial','',14);
	// $pdf->Ln(10);
	// $pdf->Write(5,'The file size of this PDF is only 13 KB.');

	$pdf->Output();
?>