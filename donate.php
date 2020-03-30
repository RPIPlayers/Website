<?php
include("inc/root.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("inc/header.php"); //head
?>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<?php include("inc/menu.php"); //navigation
?>
    
<!-- History Header -->
<header class="intro">
<div class="intro-body">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="brand-heading">Donate</h1>
				<p class="intro-text">
					Support the RPI Players
				</p>
				<a href="#single-project" class="btn btn-circle page-scroll">
				<i class="fa fa-angle-double-down animated"></i>
				</a>
			</div>
		</div>
	</div>
</div>
</header>
<!-- Resources Section -->
<section id="single-project">
<div class="container content-section text-center">
	<div class="row">
		<h2>Support</h2>
		<div class="col-lg-8 col-lg-offset-2">
			<p>
			Thank you for your interest in financially supporting us at the RPI Players! Every penny that gets donated to us will go straight back into strengthening our club through revitalizing our space, upgrading our equipment, and creating more art.
			</p>
			<p>
			To donate, please press the button below, and when asked for designations, specify the "RPI Players."
			</p>
			<p>
			<img src="img/donate_example.png" alt="Donation image">
			</p>
				<div class="form" class="showSearch" id="contactform">
					<input type="submit" id="submit" onclick="window.location.href = 'https://securelb.imodules.com/s/1225/mobile/mobile.aspx?sid=1225&gid=1&pgid=6795&dids=.101&bledit=1&sort=1';" class="clearfix btn" value="Donate">
				</div>

		</div>
	</div>
</div>
</section>
<!-- Footer -->
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

