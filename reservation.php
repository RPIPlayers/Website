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
<header class="intro"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="intro-body">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="brand-heading">Reservations</h1>
				<p></p>
				<a href="#about" class="btn btn-circle page-scroll">
				<i class="fa fa-angle-double-down animated"></i>
				</a>
			</div>
		</div>
	</div>
</div>
</header>
<!-- Resources Section -->
<section id="tickets">
<div class="container content-section text-center">
	<div class="row">
	    <h2>Pride and Prejudice Ticketing</h2>
		<div style="width:100%; text-align:left;"><iframe src="https://eventbrite.com/tickets-external?eid=79551593959&ref=etckt" frameborder="0" height="445" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe><div style="font-family:Helvetica, Arial; font-size:12px; padding:10px 0 5px; margin:2px; width:100%; text-align:left;" ><a class="powered-by-eb" style="color: #ADB0B6; text-decoration: none;" target="_blank" href="https://www.eventbrite.com/">Powered by Eventbrite</a></div></div>
		
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
<script src="js/theme_static.js"></script>
<body onload="displayMenu()"></body>
</body>
</html>

