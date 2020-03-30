<?php
include("inc/root.php");
include("inc/header.php"); //head
?>
<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

</style>
</head>
<body>
<?php include("inc/menu.php"); //navigation
?>

<div class="container"> 
<?php
	echo display_modal();
?>
</div>
  

<!-- Intro Header -->
<header class="intro">
<div class="intro-body">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="brand-heading">The RPI Players</h1>
				<p class="intro-text">
					since 1929
				</p>
				<a href="#gallery" class="btn btn-circle page-scroll">
				<i class="fa fa-angle-double-down animated"></i>
				</a>
			</div>
		</div>
	</div>
</div>
</header>
<!-- About Section -->
<section id="gallery">
<div class="container content-section text-center">

	
	<?php 
		echo display_gallery();
	?>
	
</div>
</section>
<?php include("inc/footer.php"); //footer
?>

<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/theme.js"></script>


</body>
</html>
