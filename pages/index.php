<!DOCTYPE html>
<html>
<head>
<title>Web bán hàng công nghệ</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>

<div class="wrapper">
	
	<?php 
	  session_start();
	  include('../admincp/config/config.php');
		include('header.php');
		include('menu.php');
		include('main.php');
		include('footer.php');
	?>
	
	
</div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  	
  </script>
  <script type="text/javascript">
  	// Show the first tab and hide the rest
$('#tabs-nav li:first-child').addClass('active');
$('.tab-content').hide();
$('.tab-content:first').show();

// Click function
$('#tabs-nav li').click(function(){
  $('#tabs-nav li').removeClass('active');
  $(this).addClass('active');
  $('.tab-content').hide();
  
  var activeTab = $(this).find('a').attr('href');
  $(activeTab).fadeIn();
  return false;
});
  </script>
<!-- <script type="text/javascript">
	$(document).ready(function() {

  var back = $(".prev");
  var next = $(".next");
  var steps = $(".step");

  next.bind("click", function() {
    $.each(steps, function(i) {
      if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
        $(steps[i]).addClass('current');
        $(steps[i - 1]).removeClass('current').addClass('done');
        return false;
      }
    })
  });
  back.bind("click", function() {
    $.each(steps, function(i) {
      if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
        $(steps[i + 1]).removeClass('current');
        $(steps[i]).removeClass('done').addClass('current');
        return false;
      }
    })
  });

})
</script> -->
</body>
</html>