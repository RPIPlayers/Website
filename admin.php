<?php
session_start();
include_once("inc/root.php");
include_once("inc/carp.php");



// Check if image file is a actual image or fake image
if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["file"])) {
		$upload= false;
            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
             /*    //Print file details
             echo "Upload: " . $_FILES["file"]["name"] . "<br />";
             echo "Type: " . $_FILES["file"]["type"] . "<br />";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			*/
			
			
			
                 //if file already exists
             if (file_exists("upload/" . $_FILES["file"]["name"])) {
				echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
				$storagename = "carp_update.csv";
					move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $storagename);
				$upload=true;
			}
        }
	} else {
		echo "No file selected <br />";
	}
	 
	if ( isset($storagename) && $file = fopen("uploads/" .$storagename , 'r' ) ) {
		$csv_contents = [];
		while(!feof($file))
		{
			array_push($csv_contents,fgetcsv($file));
		}
		
		
		
		if(sizeof($csv_contents)<10){
			echo "<script type='text/javascript'>alert('Invalid CSV');</script>";
		} else {
			$show_index = $csv_contents[0][1];
			$show_title = $csv_contents[1][1];
			$show_sub_title = $csv_contents[2][1];
			$show_writer = $csv_contents[3][1];
			$show_description = $csv_contents[4][1];
			$show_season = $csv_contents[5][1];
			
			$show_index = add_show($show_index, $show_title,$show_sub_title,$show_writer,$show_description,$show_season);

			for ($x = 8; $x < sizeof($csv_contents)-1; $x++) {
				$role = $csv_contents[$x][0];
				$role_type = $csv_contents[$x][1];
				$assistant = $csv_contents[$x][2];
				$first = $csv_contents[$x][3];
				$last = $csv_contents[$x][4];
				$class = $csv_contents[$x][5];
				add_role($role,$role_type,$assistant,$first,$last,$class,$show_index,$show_season);
				
			} 
		}
		
		
		fclose($file);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
include("inc/header.php"); //head
include("inc/menu.php");
$post_keys = array_keys($_POST);

foreach ($post_keys as &$key) 
{
	if(is_int($key)){
		delete_announcement($key);
	}
}
if(isset($_POST['title']))
{
	create_announcement($_POST['title'],$_POST['subtitle'],$_POST['text']);
	$_POST = array();
}
?>
 
<!-- About Section -->
<section id="announcements">
<div class="container content-section text-center">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
           <h3>Announcements</h3>

				<?php

				display_announcement();
				
				?>
				<p></p>
				<button type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#create'>Create Announcement</button>
				<div id='create' class='modal fade' role='dialog'>
				  <div class='modal-dialog'>

					<!-- Modal content-->
					
					<div class='modal-content'>
						<form method='post'>
							<div class='modal-header'>

								<input type="body" name="title" placeholder="Title *"></input>
							</div>
							<div class='modal-body'>

								<input type="text" name="subtitle" placeholder="Subtitle *"></input>
							</div>
							<div class='modal-body'>
								<p>
									<textarea class="form-control" name="text" rows="3" placeholder="Text *"></textarea>
								</p>
							<p2>The above boxes have support for html code </p2>          </div>
							<div class='modal-footer'>
								<button type='submit' class='btn btn-success btn-close' >Submit</button>
								<button type='button' class='btn btn-default btn-close' data-dismiss='modal'>Close</button>
							</div>
						</form>
					</div>
				  </div>
				</div>

		</div>
	</div>
</div>
</div>
</section>
<section id="CARP">
<div class="container content-section text-center">
	<div class="row">
        <div class="col-lg-8 col-lg-offset-2">
		<h3>CARP Update</h3>
			<p>
			Upload a csv to add a record to the database. If you are editing a record then please specifiy the show's id that you are editing. An example csv can be found <a href="uploads/carp_example.csv" style="color:#0000EE"> here </a>
			</p>
			<p>
			To find a list of role types click <a href="uploads/CARP_Role_Type.csv" style="color:#0000EE"> here</a>
			</p>
				<div class="form">
					<form action="admin.php" method="post" enctype="multipart/form-data" id="contactform">
						<input type="file" name="file" id="file">
						<button type="submit" value="Upload Image" class="btnghost" name="submit"> Upload</button>
					</form>
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
</html>

