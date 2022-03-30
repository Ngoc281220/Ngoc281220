<?php
	include('../../config/config.php');
	if(isset($_GET['code'])){
		$code_cart=$_GET['code'];
		$sql_update="UPDATE tbl_cart SET cart_satust=0 WHERE code_cart='$code_cart'";
		$sql=mysqli_query($conn,$sql_update);
		header('location:../../index.php?action=quanlydonhang&query=lietke');
	}
?>