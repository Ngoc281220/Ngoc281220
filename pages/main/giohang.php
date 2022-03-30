
<p>Giỏ hàng</p>
<?php
    if(isset($_SESSION['dangky'])){
        echo 'Xin chào: '.'<span style="color:red;">' .$_SESSION['dangky'].'</span>';
        echo $_SESSION['id_khachhang'];
    }
?>
<?php
    if(isset($_SESSION['cart'])){

    }
?>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
        <div class="step current"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
        <div class="step "> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
        <div class="step  "> <span><a href="index.php?quanly=thanhtoan" >Thanh toán</a><span> </div>
        <div class="step  "> <span><a href="index.php?quanly=donhangdadat" >Lịch sử đơn hàng</a><span> </div>


  </div>
  <!-- end Responsive Arrow Progress Bar -->
</div>
<table style="width: 100%; text-align: center;border-collapse: collapse;border-radius: 3px;" >
    <tr style="color: #fff; background: blue;">
        <th>Id</th>
        <th>Mã sp</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>
    <?php
    if(isset($_SESSION['cart'])){
        $i=0;
        $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien= $cart_item['soluong'] * $cart_item['gia'];
            $tongtien+=$thanhtien;
            $i++;
    ?>
    <tr>
        <td> <?php echo $i ?></td>
        <td><?php echo $cart_item['masp']?></td>
        <td><?php echo $cart_item['tensanpham']?></td>
        <td><img width="150px" height="150px"src="../admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']?>"></td>
        <td>
            <a href="main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>
            <?php echo $cart_item['soluong']?>
            <a href="main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a>
            </td>
        <td><?php echo number_format($cart_item['gia'],2,',','.').'vnd'?></td>
        <td><?php  echo number_format($thanhtien,2,',','.').'vnd' ?></td>
        <td><a href="main/themgiohang.php?xoa=<?php echo $cart_item['id']?>"><i class="fa fa-trash-o fa-delete" aria-hidden="true"></i></a></td>
    </tr>

    <?php
  }
  ?>
    <tr>
        <td colspan="8">
            <p style="float: left; color: red; font-weight: bold;">Tổng tiền: <?php echo number_format($tongtien,2,',','.').'VND'?></p>
            <p style="float: right;"><a href="main/themgiohang.php?xoatatca=1" style="color:#000066;text-decoration: none; background-color: #FF3300; padding: 10px;margin-right: 3px;font-weight: bold; border-radius: 4px;">Xóa tất cả</a></p>
            <div style="clear:both;"></div>
         <?php
            if(isset($_SESSION['dangky'])){
         ?>
         <p><a href="main/thanhtoan.php">Đặt hàng</a></p>
         <?php
     }else{
         ?>
         <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
     <?php
     }
     ?>
        </td>
    </tr>
 <?php

}else{
    ?>
    <tr>
        <td colspan="8"><p>Hiện tại giỏ hàng còn trống</p></td>
    </tr>
    <?php
}
    ?>
</table>