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
<!-- Intro Header -->
<header class="intro">
<div class="intro-body">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="brand-heading">The Player's Archive</h1>
				<p class="intro-text">
					Search shows and players
				</p>
				<a href="#about" class="btn btn-circle page-scroll">
				<i class="fa fa-angle-double-down animated"></i>
				</a>
			</div>
		</div>
	</div>
</div>
</header>
<!-- About Section -->
<section id="about">
<div class="container content-section text-center">
	<div class="row">
		<p>Please search for any of the over 300 shows of the RPI Players or over the one thousand players. After searching just click the name and you will be redirected to more information </p>
        <!--A1 --->
        <div class="col-md-6">
			<form method="post" id="contactform" name="search" action="" class="playerSearch">	
				<h4>Search Players</h4>
				<div class="form">
					<input type="text" name="name" id="searchPlayers" class="typeahead" placeholder="Search Players *"/>
					<input type="submit" id="submit" class="clearfix btn" value="Search">
				</div>
			</form>
			<table class="playerTable table">
			  
			</table>
        </div>
        <!--A2 --->
        <div class="col-md-6">
			<form method="post" id="contactform"  name="search" action="" class="showSearch">	
				<h4>Search Shows</h4>
				<div class="form">
					<input type="text" name="name" id="searchShows" class="typeahead" placeholder="Search Shows *"/>
					<input type="submit" id="submit" class="clearfix btn" value="Search">
				</div>
			</form> 
			<table class="showTable table">
			  
			</table>			
		</div>
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
<script>
    $(document).ready(function () {
		$('.playerSearch').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				url: "inc/carp.php",
				data: 'query='+jQuery("#searchPlayers").val()+':players_result',            
				dataType: "json",
				type: "POST",
				success: function (data) {
					$( ".playerTable" ).empty()
					$( ".playerTable" ).append( data);
				}
			});
		});
    });
	$(document).ready(function () {
		$('.showSearch').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				url: "inc/carp.php",
				data: 'query='+jQuery("#searchShows").val()+':show_result',            
				dataType: "json",
				type: "POST",
				success: function (data) {
					$( ".showTable" ).empty()
					$( ".showTable" ).append( data);
				}
			});
		});
    });
</script>

</body>
</html>