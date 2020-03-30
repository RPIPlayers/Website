<?php
include("inc/root.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("inc/header.php"); //head
?>

<body link=>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<?php include("inc/menu.php"); //navigation
?>
<!-- Intro Header -->
<header class="intro"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="intro-body">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="brand-heading">The RPI Players</h1>
				<p class="intro-text">
					since 1929
				</p>
				<a href="#ticket" class="btn btn-circle page-scroll">
				<i class="fa fa-angle-double-down animated"></i>
				</a>
			</div>
		</div>
	</div>
</div>
</header>
<!-- Ticket Section Section -->
<section id="ticket">
<div class="container content-section text-center">
	<div class="row">
		        <div class="col-lg-8 col-lg-offset-2">
			<h2>Pride and Prejudice</h2>
			<p>
				 Our fall show Pride and Prejudice is currently showing in the RPI Playhouse! Tickets are avaliable at <a href="https://players.rpi.edu/reservation#tickets"> players.rpi.edu/reservation </a>
			</p>
		</div>
	</div>
</div>
</section>
<!-- About Section -->
<section id="about">
<div class="container content-section text-center">
	<div class="row">
        <!--A1 --->


        <div class="col-md-6">
            <h3>About the Players</h3>
            <p>The RPI Players is a student-run theatre company open to all RPI students, faculty, staff, and the greater Capital Region community.  The RPI Players is one of the oldest theatre troupes in the area, and has staged over 300 shows in it's nearly 90 seasons. The RPI Players produce between three and six shows per year, and call the RPI Playhouse their home. Often, the Players will collaborate with a variety of performing arts organizations on campus and in the community.</p>
            <br>
        </div>
        <!--A2 --->
        <div class="col-md-6">
           <h3>Announcements</h3>
            
                        <?php
						
						display_announcement();
						
						?>
                    
                    
		</div>
	</div>
</div>
</div>
</section>
<!-- Season Marquee and Current Season Link -->
 <!-- commented out until artwork exists
<section id="about">
<div class="container content-section text-center">
	<div class="row">
		<h2>the 88th Season</h2>
        <div class="col-md">
            <a href="/current.html">
		<img src="/img/season/Marquee.jpg" alt="88th">
		</a>
        </div>
		<div class="col-lg-8 col-lg-offset-2">
            <p>Current Season Information</p>
		</div>
	</div>
</div>
</section>
<!-- Contact / Social Media Section -->
<section id="contact">
<div class="container content-section text-center">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<h2>Follow the RPI Players</h2>
			<p>
				 To stay up to date with the latest information within the RPI Players, follow us on social media!  You can also contact us and ask to subscribe to our membership or show announcement email lists.
			</p>
			<p>
				<i><a href="mailto:rpi-players@rpi.edu" style="border-bottom:1px dashed #ccc;">rpi-players@rpi.edu</a></i>
			</p>
			<ul class="list-inline banner-social-buttons">
				<li>
				<a href="https://twitter.com/theRPIPlayers" class="btn btnghost btn-lg" target="_blank"><i class="fa fa-twitter fa-fw"></i><span class="network-name">Twitter</span></a>
				</li>
				<li>
				<a href="https://www.facebook.com/TheRPIPlayers/" class="btn btnghost btn-lg" target="_blank"><i class="fa fa-facebook fa-fw"></i><span class="network-name">Facebook</span></a>
				</li>
				<li>
				<a href="https://www.instagram.com/therpiplayers/" class="btn btnghost btn-lg" target="_blank"><i class="fa fa-instagram fa-fw"></i><span class="network-name">Instagram</span></a>
				</li>
			</ul>
		</div>
	</div>
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
<!--Snow-->
    <!--
<script src="js/snowstorm.js"></script>
    -->
</body>
</html>