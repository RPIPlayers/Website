<?php
include("inc/root.php");

include_once('inc/carp.php');

if ( ! empty( $_GET ) ) {
    if ( isset( $_GET['index'] ) ) {
		$index = $_GET['index'];
		$name = get_person_name($index);
    }
}


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
<div class="container content-section text-center">
	<div class="row">
	<h1> 
<?php if(isset($_GET['index'])){ 
	echo $name; 
		$results =  get_player_role_index($index);
		$header ="</h1><hr>
		<div class='col-lg-8 col-lg-offset-2'>
			<table class='table'>
		<thead>
				<tr>
				  <td scope='col'><b>Show</b></td>
				  <td scope='col'><b>Role</b></td>
				  <td scope='col'><b>Year</b></td>
				</tr>
			</thead>
			<tbody>";
		$output = $header;
		foreach ($results as $value) {
			$role_number = $value[0];
			
			$show_index = get_show_index($role_number);
			
			$show = get_show_name($show_index);
			$role = get_role($role_number);
			$year = get_season_year(get_season($show_index));
			$next = "<tr class='highlight'>
				  <td><a href='/show_information.php?index=$show_index'>$show</a></td>
				  <td>$role</td>
				  <td>$year</td>
				</tr>
			
				
				";
			$output = $output.$next;
			
		}
		$tail = "</tbody>
		
		</table>
		<div class='highlight'>Click on the show name to learn more about the production. </div>
			</div>
			";
		echo $output.$tail;
	} ?> 
	</div>
</div>
</header>


<?php include("inc/footer.php"); //footer
?>


<!-- jQuery -->

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