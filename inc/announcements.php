<?php
include_once("mysql.php");

function get_announcement()
{
	$mysql = OpenCon();
	$querry = "select * from announcements;";
	$result = mysqli_query($mysql,$querry);
	return $result;
}

function delete_announcement($id)
{
	$mysql = OpenCon();
	$querry = "DELETE FROM announcements where id=$id;";
	$result = mysqli_query($mysql,$querry);
}	

function create_announcement($announcement, $title, $subtext)
{
	$mysql = OpenCon();
	$querry = "INSERT INTO announcements (id, title, subtitle, text) VALUES (NULL, '$announcement', '$title', '$subtext');";
	$result = mysqli_query($mysql,$querry);

}

function display_announcement()
{
	$rows = [];
	$result = get_announcement();
	
	while($row = mysqli_fetch_array($result))
	{
		$rows[] = $row;
	}
	
	$numberRows = mysqli_num_rows($result);
	
	if ( isset( $_SESSION['user_id'] ) ) {
		if($numberRows!=0){
			head_announcement();
			for ($i = 0; $i < $numberRows; $i++) {
				output_admin_announcement($rows[$i]['title'],$rows[$i]['subtitle'],$rows[$i]['text'],$rows[$i]['id']);
			}
			tail_announcement();
		} else {
			no_announcement();
		}
	} else {
		if($numberRows!=0){
			head_announcement();
			for ($i = 0; $i < $numberRows; $i++) {
				output_announcement($rows[$i]['title'],$rows[$i]['subtitle'],$rows[$i]['text'],$rows[$i]['id']);
			}
			tail_announcement();
		} else {
			no_announcement();
		}
	}
}
function head_announcement()
{
	echo "
	<div class='table-responsive'>          
                <table class='table table-hover'>
                    <tbody>";
}

function tail_announcement()
{
	echo "
	</tbody>
                </table>";
}

function output_announcement ($announcement, $title, $subtext, $id)
{
	echo "
	<tr>
	<td><b>Announcement:</b>$announcement</td>
	<td><button type='button' class='btn btn-sm btn-info' data-toggle='modal' data-target='#A$id'>More Information</button>
	<!-- Modal -->
		<div id='A$id' class='modal fade' role='dialog'>
		  <div class='modal-dialog'>

			<!-- Modal content-->
			<div class='modal-content'>
			  <div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'>$title</h4>
			  </div>
			  <div class='modal-body'>
					<p>
					$subtext
					</p>

				<p2>Contact: Executive Officers | RPI Players<br><a href='mailto:rpi-players@rpi.edu'>rpi-players@rpi.edu</a></p2>          </div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-close' data-dismiss='modal'>Close</button>
				</div>
			  </div>
			</div>
		  </div>
		</td>
	</tr>";
}

function output_admin_announcement ($announcement, $title, $subtext, $id)
{
	echo "
	<tr>
	<td><b>Announcement:</b>$announcement</td>
	<td><button type='button' class='btn btn-sm btn-info' data-toggle='modal' data-target='#A$id'>More Information</button>
	<!-- Modal -->
		<div id='A$id' class='modal fade' role='dialog'>
		  <div class='modal-dialog'>

			<!-- Modal content-->
			<div class='modal-content'>
			  <div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'>$title</h4>
			  </div>
			  <div class='modal-body'>
					<p>
					$subtext
					</p>

				<p2>Contact: Executive Officers | RPI Players<br><a href='mailto:rpi-players@rpi.edu'>rpi-players@rpi.edu</a></p2>          </div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-close' data-dismiss='modal'>Close</button>
				</div>
			  </div>
			</div>
		  </div>
		</td>
	<td>
	<form method='post'>
		<input type='submit' class='btn btn-danger btn-close'  name='$id' value='delete' /><br/>
	</form>
	</tr>";
}

function no_announcement ()
{
	echo "
	<tr>
	<td><b>No announcements</b></td>
	</tr>";
}



?>
