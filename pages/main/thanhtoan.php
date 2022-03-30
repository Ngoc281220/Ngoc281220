<p>Thanh toán đơn hàng</p>
<?php
	session_start();
	include('../../admincp/config/config.php');
	require('../../mail/sendmail.php');
	require('../../carbon/autoload.php');
	use Carbon\Carbon;
	use Carbon\CarbonInterval;
	$now = Carbon::now('Asia/Ho_Chi_Minh');
	$id_khachhang=$_SESSION['id_khachhang'];
	$code_order=rand(0,9999);
	$inset_cart="INSERT INTO tbl_cart( id_khachhang, code_cart, cart_satust,cart_date) VALUES ('$id_khachhang','$code_order',1,'$now')";
	$cart_query=mysqli_query($conn,$inset_cart);
	if($cart_query){
		foreach($_SESSION['cart'] as $key => $value){
			$id_sanpham = $value['id'];
			$soluong = $value['soluong'];
			$inset_order_details="INSERT INTO tbl_cart_detail( code_cart, id_sanpham, soluongmua) VALUES ('$code_order','$id_sanpham','$soluong')";
			mysqli_query($conn,$inset_order_details);
		}
		$tieude="Đặt hàng website Webbanhangcong.net thành công";
		$noidung.="<p>Cảm ơn bạn đã đặt hàng của chúng tôi với mã đơn hàng:".$code_order."</p>";
		$noidung="<h4>Đơn đặt hàng bao gồm: </h4>";
		foreach($_SESSION['cart'] as $key =>$val){
			$noidung.="<ul style='border:1px solid red; margin:10px;'>
					<li>".$val['tensanpham']."</li>
					<li>".$val['masp']."</li>
					<li>".number_format($val['gia'],2,',','.')."đ</li>
					<li>".$val['soluong']."</li>

			         </ul>";
		}
		$maildathang=$_SESSION['email'];
		 $mail = new Mailer();
		 $mail->dathangmail($tieude,$noidung,$maildathang);
	}
	 unset($_SESSION['cart']);
	header('location:../index.php?quanly=camon');
?>