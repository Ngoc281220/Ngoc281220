<?php
include('../../config/config.php');
$tensanpham=$_POST['tensanpham'];
$masp=$_POST['masp'];
$giasp=$_POST['giasp'];
$soluong=$_POST['soluong'];
$hinhanh=$_FILES['hinhanh']['name'];
$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
$hinhanh=time().'_'.$hinhanh;
$folder_uploads="uploads/";
$tomtat=$_POST['tomtat'];
$noidung=$_POST['noidung'];
$tinhtrang=$_POST['tinhtrang'];
$danhmuc=$_POST['danhmuc'];



if(isset($_POST['themsanpham']))
{
	$sql_them="INSERT INTO tbl_sanpham(tensanpham,masp,gia,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUES ('$tensanpham','$masp','$giasp','$soluong','$hinhanh','$tomtat','$noidung','$tinhtrang','$danhmuc')";
		mysqli_query($conn,$sql_them);
	$move_foler=move_uploaded_file($hinhanh_tmp,$folder_uploads.$hinhanh);
	if($move_foler){
		echo "Upload thành công";
	}

		header('location:../../index.php?action=quanlysanpham&query=them');
}
else if(isset($_POST['suasanpham'])){
	if(!empty($_FILES['hinhanh']['name'])){
		    $move_foler=move_uploaded_file($hinhanh_tmp,$folder_uploads.$hinhanh);
       $sql_sua="UPDATE tbl_sanpham SET tensanpham='$tensanpham',masp='$masp',gia='$giasp',soluong='$soluong',hinhanh='$hinhanh',tomtat='$tomtat',noidung='$noidung',tinhtrang='$tinhtrang',id_danhmuc='$danhmuc' WHERE id_sanpham='$_GET[idsanpham]' ";
       $sql="SELECT *FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
			$query=mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($query)){
				unlink('uploads/'.$row['hinhanh']);
			}
          

   }else{
   	 $sql_sua="UPDATE tbl_sanpham SET tensanpham='$tensanpham',masp='$masp',gia='$giasp',soluong='$soluong',tomtat='$tomtat',noidung='$noidung',tinhtrang='$tinhtrang',id_danhmuc='$danhmuc' WHERE id_sanpham='$_GET[idsanpham]' ";
   }
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?action=quanlysanpham&query=them');
}
else{
	$id=$_GET['idsanpham'];
	$sql="SELECT *FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
	$query=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
	}
	$sql_xoa="DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?action=quanlysanpham&query=them');
}
?>