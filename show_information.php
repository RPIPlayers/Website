<?php
include("inc/root.php");

include_once('inc/carp.php');

if ( ! empty( $_GET ) ) {
    if ( isset( $_GET['index'] ) ) {
		$index = $_GET['index'];
		$name = get_show_name($index);
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
		$year = get_season_year(get_season($index));
		echo $name.' '.$year; 
		$results =  get_show_roles($index);
		$description = get_show_description($index);
		
		$header ="</h1><br>$description<hr>";
		$output = $header;
		
		if($results[0] != 0){
			$table = "
			<div class='col-lg-8 col-lg-offset-2'>
				<table class='table'>
			<thead>
				<tr>
				  <td scope='col'><b>Role</b></td>
				  <td scope='col'><b>Person</b></td>
				</tr>
			</thead>
			<tbody>";
			$output=$output.$table;
		
			foreach ($results as $value) {
				$role_number = $value[0];			
				$role = get_role($role_number);
				$person_index = get_person_index_role($role_number);
				$name = get_person_name($person_index);
				$next = "<tr class='highlight'>
					  <td>$role</td>
					  <td><a href='/player_information.php?index=$person_index'>$name</a></td>
					</tr>";
				$output = $output.$next;
			}
			$tail = "</tbody>
			</table>
			<div class='highlight'>Click on the person name to learn more about their past roles. </div>
			</div>
			
			";
			$output = $output.$tail;
			
		} else {
			$body = "<h3> No information currently avaliable. Try another show</h3>";
			$output = $output.$body;
		}
		echo $output;
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