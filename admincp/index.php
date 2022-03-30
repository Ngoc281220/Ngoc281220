<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin xin chao moi nguoi</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

</head>
<body>
	<h3 class="title_admin">Wellcom to Admin</h3>
	<div class="wrapper">
	<?php
		include('config/config.php');
		include('modules/header.php');
	    include('modules/menu.php');
		include('modules/main.php');
		include('modules/footer.php');
		
	?>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  <script>
     CKEDITOR.replace( 'tomtat' );
       CKEDITOR.replace( 'noidung' );
        CKEDITOR.replace( 'thongtinlienhe' );
  </script>
  <script type="text/javascript">
  	 $(document).ready(function(){
  	 	  thongke();
			  var char = new Morris.Area({
			  
			  element: 'chart',
			  xkey: 'date',
			  ykeys: ['date','order','sales','quantity'],
			  labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']
			});
			  $('.select-date').change(function(){
			  	var thoigian=$(this).val();
			  	if(thoigian=='7ngay'){
			  		var text='7 ngày qua';
			  	}
			  	else if(thoigian=='28ngay'){
			  		var text='28 ngày qua';
			  	}
			  	else if(thoigian=='90ngay'){
			  		var text='90 ngày qua';
			  	}
			  	else{
			  		var text='365 ngày qua';
			  	}
			  //	$('#text-date').text(text);
			  	 $.ajax({
			  	 url: "modules/thongkes.php",
           type: "POST",
           dataType: "JSON",
           data:{thoigian:thoigian},
           success: function (data) {
               char.setData(data);
			   	 		$('#text-date').text(text);
           }
       });
		 })
			  	function thongke(){
			  		var text =' 365 ngày qua ';
			  		$('#text-date').text(text);
			  		 $.ajax({
			  	 url: "modules/thongkes.php",
           type: "POST",
           dataType: "JSON",
           success: function (data) {
               char.setData(data);
			   	 		$('#text-date').text(text);
           }
       });

			 }

		});
  </script>
</body>
</html>