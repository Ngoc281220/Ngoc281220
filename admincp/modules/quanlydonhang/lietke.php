<p>Liệt kê đơn hàng</p>
<?php
$sql_lietke_dh="SELECT * FROM tbl_cart,tbl_dangki WHERE tbl_cart.id_khachhang=tbl_dangki.id_dangki ORDER BY tbl_cart.id_cart DESC";
$query_lietke_dh=mysqli_query($conn,$sql_lietke_dh);
?>
<table border="1" width="100%" style="border-collapse: collapse;">
	<tr>
    <td>Id</td>
  	<td>Mã đơn hàng</td>
  	<td>Tên khách hàng</td>
  	<td>Địa chỉ</td>
  	<td>Email</td>
  	<td>Số điện thoại</td>
    <td>Tình trạng</td>
    <td>Ngày đặt</td>
  	<td>Quản lý</td>
    <td>In đơn hàng</td>
  </tr>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;

  ?>
  <tr>
    <td><?php echo $i;?></td>
  	<td><?php echo $row['code_cart'];?></</td>
  	<td><?php echo $row['tenkhachhang'];?></</td>
  	<td><?php echo $row['diachi'];?></</td>
  	<td><?php echo $row['email'];?></</td>
  	<td><?php echo $row['dienthoai'];?></</td>
    <td>
      <?php
          if($row['cart_satust']==1){
            echo'<a href="modules/quanlydonhang/xuly.php?&code='.$row['code_cart'].'">Đơn hàng mới</a>';
          }else{
            echo'Đã xem';
          }
      ?>
    </td>
    <td><?php echo $row['cart_date'];?></</td>
  	<td><a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart']?>">Xem đơn hàng</a></td>
    <td><a href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_cart']?>">In đơn hàng</a></td>

  </tr>
 <?php
}
 ?>
</table>