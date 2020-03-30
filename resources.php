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
<!-- Resources Header -->
<header class="intro">
<div class="intro-body">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="brand-heading">Resources</h1>
				<p class="intro-text">
					Information, Calendars, and Documents
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
<!--Calendar-->
<div class="container content-section text-center">
	<div class="row">
		<h2>Calendar</h2>
		<div class="col-lg-8 col-lg-offset-2">
			<iframe src="https://calendar.google.com/calendar/embed?src=rpiplayers%40gmail.com&ctz=America%2FNew_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
		</div>
        
	</div>
</div>
<!--Documents-->
<div class="container content-section text-center">
	<div class="row">
		<h2>Club Documents</h2>
    <section id="portfolio">
        <div class="container content-section text-center">
           <div class="row"> 
		      <div class="col-sm-2 col-sm-offset-2">
			     <p>
				    <a href="https://drive.google.com/drive/folders/1OwqlBNcKUrGDIP8Pm1Yc5fipIzddkCla?usp=sharing" target="_blank" class="btnghost"><i class="fa fa-folder"></i> Meeting Minutes</a>
			     </p>
		      </div>
               <div class="col-sm-2 col-sm-offset-1">
                   <p>
                       <a href="https://drive.google.com/drive/folders/1m3jhvOlfBR39jJz05tV-fI8gy65COBur?usp=sharing" target ="_blank" class="btnghost"><i class="fa fa-folder"></i> Governing Documents</a>
                   </p>
               </div>
               <div class="col-sm-2 col-sm-offset-1">
                   <p>
                       <a href="https://drive.google.com/drive/folders/1DMo_SkHO5qJmHDwgkonuBQ_4Gc06d_9p?usp=sharing" target="_blank" class="btnghost"><i class="fa fa-folder"></i> Other Documents</a>
                   </p>
                </div>
           </div>
        </div>
		<div class="container content-section text-center">
	       <div class="row">
		      <h2>Players Wikipedia</h2>
              <div class="col-lg-8 col-lg-offset-2">
                <p>For more general information please visit our wikipedia located at <a href="w/" target="_blank">players.rpi.edu/w</a></p>
		      </div>
	       </div>
        </div>
        <!-- Playhouse -->
        <div class="container content-section text-center">
	       <div class="row">
		      <h2>RPI Playhouse</h2>
              <div class="col-lg-8 col-lg-offset-2">
                <p>For information about the RPI Playhouse, please visit <a href="http://playhouse.union.rpi.edu" target="_blank">playhouse.union.rpi.edu.</a></p>
		      </div>
	       </div>
        </div>
    </section>
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

