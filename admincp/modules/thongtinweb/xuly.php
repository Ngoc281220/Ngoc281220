<?php
include('../../config/config.php');
$thongtinlienhe =$_POST['thongtinlienhe'];
$id=$_GET['id'];
 if(isset($_POST['submitlienhe'])){
  $sql_update="UPDATE tbl_lienhe SET thongtinlienhe='$thongtinlienhe' WHERE id='$id'";
  mysqli_query($conn,$sql_update);
    header('location:../../index.php?action=quanlyweb&query=capnhat');
 }
?>