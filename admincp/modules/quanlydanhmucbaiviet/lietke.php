<?php
$sql_lietke_danhmucbv="SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
$query_lietke_danhmucbv=mysqli_query($conn,$sql_lietke_danhmucbv);
?>

<p>Liệt kê sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
	<tr>
    <td>Id</td>
  	<td>Tên danh mục</td>
  	<td>Quản lý</td>
  </tr>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
    $i++;

  ?>
  <tr>
    <td><?php echo $i;?></td>
  	<td><?php echo $row['tendanhmuc_baiviet'];?></</td>
  	<td><a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet']?>">Xóa</a>|<a href="index.php?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet']?>">Sửa</a></td>
  </tr>
 <?php
}
 ?>
</table>