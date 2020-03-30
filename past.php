<?php
include("inc/root.php");
include_once("inc/carp.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("inc/header.php"); //head
?>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >
<?php include("inc/menu.php"); //navigation
?>
<!-- Intro Header -->
<header class="intro">
<div class="intro-body">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="brand-heading">Past Productions</h1>
				<p class="intro-text">
					since 1929
				</p>
				<a href="#archive" class="btn btn-circle page-scroll">
				<i class="fa fa-angle-double-down animated"></i>
				</a>
			</div>
		</div>
	</div>
</div>
</header>
<section id="archive">
<div class="container content-section text-center">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<h2>List of the RPI Player's past shows</h2>
				<div class="accordion" id="accordionExample">
				  <div class="card z-depth-0 bordered">
					<?php
					$results =  get_show_list("");
					$show_index_array = [];
					$show_season_array = [];
					
					foreach ($results as $value) {
						
						$show_index = get_show_index_name($value);
						foreach ($show_index as $index){
							$show = $index['Show_Index'];
							$season = round(get_season($show));
							if(!contains($show_index_array, $show)){
								
								array_push($show_index_array,$show);
								array_push($show_season_array,$season);
							}
						}
						
					}
					
					array_multisort($show_season_array,$show_index_array);
					
					$output_buckets = [];
					$output="";
					$last_season = $show_season_array[sizeof($show_season_array)-1];
					$num_of_buckets = $last_season / 10;
					$index = 0;
					$current_season=0;
				
					for($a = 0; $a < $num_of_buckets;$a++){
						$footer ="	
									</div>
								</div>
							</div>";
						if($a != ($num_of_buckets - 1)){
							$output = $output.$footer;
						}
						$season_start = ($a * 10)+1;
						$season_end = $season_start + 9;
						$start_year = get_season_year($season_start);
						$end_year = get_season_year($season_end);
						$header = "
						<div class='card'>
							<div class='card-header' id='heading_$a'>
								<h1 class='mb-0'>
									<button class='btnghost btn-block collapsed' type='button' data-toggle='collapse' data-target='#collapse_$a'>
										Seasons $season_start through $season_end ($start_year - $end_year)
									</button>
								</h1>
							</div>
							<div id='collapse_$a' class='collapse' aria-labelledby='heading_$a' data-parent='#accordion'>
								<div class='card-body'>
																		
						";
						$output = $output.$header;
					
						while($current_season<$season_end+1){
							if($index == sizeof($show_season_array)){
								break;
							}
							
							if((($show_season_array[$index] % 10) == 1) and ($show_season_array[$index] != $season_start)){
								break;
							}
							
							if($show_season_array[$index] != $current_season){
								$current_season = $show_season_array[$index];
								
								$year = get_season_year($current_season);
								$tail = "</tbody>
							</table>";
								if($current_season!=$season_start){
									$output=$output.$tail;
								}
								$title = "<table class='showTable table'>
								<thead>
									<tr>
									  <td scope='col'><b>Season $current_season ($year)</b></td>
									</tr>
								</thead>
								<tbody>";
								$output=$output.$title;
							}
							
							$show_index = $show_index_array[$index];
							$show_name = get_show_name($show_index);
							$show_information="
									<tr>
									  <td><a href='/show_information.php?index=$show_index' class='archive'>$show_name</a></td>
									</tr>
							";
							$output = $output.$show_information;
							
								
							
							$index++;
						}
					
						$current_season--;
						$output=$output.$tail;
						array_push($output_buckets,$output);
						$output="";
					}
					for($i = sizeof($output_buckets)-1; $i >-1; $i--){
						echo $output_buckets[$i];
					}	
					?>
					
					
				  </div>
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
<!--Snow-->
    <!--
<script src="js/snowstorm.js"></script>
    -->
</body>
</html>