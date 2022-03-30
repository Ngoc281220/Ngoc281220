<?php
    $sql_sua_danhmucbv="SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
    $query_sua_danhmucbv=mysqli_query($conn,$sql_sua_danhmucbv);
    ?>

<p>Sửa danh mục sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <form method="post" action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet']?>">
    <?php
    while($dong = mysqli_fetch_array($query_sua_danhmucbv)){
    ?>
    <tr>
    <td>Tên danh mục</td>
    <td><input type="text" name="tendanhmucbaiviet" value="<?php echo $dong['tendanhmuc_baiviet']?>"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" name="thutu" value="<?php echo $dong['thutu']?>"></td>
  </tr>
  <tr>
 
    <td colspan="2"><input type="submit" name="suadanhmucbaiviet" value="Cập nhật danh mục sản phẩm"></td>
  </tr>
    <?php
  }
    ?>
  </form>
    
</table>