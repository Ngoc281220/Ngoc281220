<p>Xem đơn hàng</p>
<?php
$code=$_GET['code'];
$sql_lietke_dh="SELECT * FROM tbl_cart_detail,tbl_sanpham WHERE tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_detail.code_cart='$code' ORDER BY tbl_cart_detail.id_cart_details DESC";
$query_lietke_dh=mysqli_query($conn,$sql_lietke_dh);
?>
<table border="1" width="100%" style="border-collapse: collapse;">
	<tr>
    <td>Id</td>
  	<td>Mã đơn hàng</td>
  	<td>Tên sản phẩm</td>
  	<td>Số lượng</td>
  	<td>Đơn giá</td>
  	<td>Thành tiền</td>
  
  </tr>
  <?php
  $i=0;
  $tongtien=0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
    $thanhtien=$row['gia']*$row['soluongmua'];
    $tongtien+=$thanhtien;
  ?>
  <tr>
    <td><?php echo $i;?></td>
  	<td><?php echo $row['code_cart'];?></</td>
  	<td><?php echo $row['tensanpham'];?></</td>
  	<td><?php echo $row['soluongmua'];?></</td>
  	<td><?php echo number_format($row['gia'],2,',','.').'vnd'?></</td>
  	<td><?php echo number_format($thanhtien,2,',','.').'vnd'?></</td>
  	
  </tr>
  
 <?php
}
 ?>
 <tr>
  	<td colspan="6">Tổng tiền: <?php echo number_format($tongtien,2,',','.').'vnd'?></td>
  </tr>
</table>