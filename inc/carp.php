<?php




include_once("mysql.php");
if (isset($_POST['query'])){
	$data = strval($_POST['query']);
	$keyword = explode(':',$data);
	
	if($keyword[1]=='players_search') {
		echo get_name_list($keyword[0]);
	}
	if($keyword[1]=='players_result') {
		$results =  get_name_list($keyword[0]);
		$header ="<thead>
				<tr>
				  <td scope='col'><b>Name</b></td>
				  <td scope='col'><b>Year</b></td>
				</tr>
			</thead>
			<tbody>";
		$output = $header;
		foreach ($results as $value) {
			$year = get_person_year(get_person_index($value));
			$index = get_person_index($value);
			$next = "<tr>
				  <td><a href='/player_information.php?index=$index' class='archive'>$value</a></td>
				  <td>$year</td>
				</tr>";
			$output = $output.$next;
			
		}
		$tail = "</tbody>";
		$output = $output.$tail;
		echo json_encode($output);
	}
	if($keyword[1]=='show_result') {
		
		$results =  get_show_list($keyword[0]);
		$header ="<thead>
				<tr>
				  <td scope='col'><b>Show</b></td>
				  <td scope='col'><b>Season</b></td>
				</tr>
			</thead>
			<tbody>";
		$output = $header;
		foreach ($results as $value) {
			$show_index = get_show_index_name($value);
			foreach ($show_index as $index){
				$show = $index['Show_Index'];
				$season = round(get_season($show));
				$next = "<tr>
					  <td><a href='/show_information.php?index=$show' class='archive'>$value</a></td>
					  <td>$season</td>
					</tr>";
				$output = $output.$next;
			}
			
		}
		$tail = "</tbody>";
		$output = $output.$tail;
		echo json_encode($output);
	}
	
}
	
if (isset($_GET['term'])){
	if($_GET['location']=='player'){
		
		$return_arr = array();
		$return_arr[] = 'yes';
		echo json_encode($return_arr);
	}
}
function get_person_index_role($role)
{
	$mysql = OpenCon();
	$querry = "select Person_Index from CARP_Player_Roles where Role_Index=$role;";
	$result = mysqli_query($mysql,$querry);
	return mysqli_fetch_assoc($result)['Person_Index'];
}
function get_person_index($name)
{
	$mysql = OpenCon();
	$querry = "select Person_Index from CARP_Player_List where CONCAT(first,' ',last)='$name';";
	$result = mysqli_query($mysql,$querry);
	return mysqli_fetch_assoc($result)['Person_Index'];
}

function get_person_year($index)
{
	$mysql = OpenCon();
	$querry = "select class from CARP_Player_List where Person_Index=$index;";
	$result = mysqli_query($mysql,$querry);
	return mysqli_fetch_assoc($result)['class'];
}

function get_person_name($person_index)
{
	
	$mysql = OpenCon();
	
	$querry = "select first,last from CARP_Player_List where Person_Index=$person_index;";
	$result = mysqli_query($mysql,$querry);
	$name_array = mysqli_fetch_assoc($result);
	$name = $name_array['first']." ".$name_array['last'];
	return $name;
}

function get_role($role_index)
{
	$mysql = OpenCon();
	$querry = "select part from CARP_Player_Roles where Role_Index=$role_index;";
	$result = mysqli_query($mysql,$querry);
	
	return mysqli_fetch_assoc($result)['part'];
}

function get_player_role_index($person_index)
{
	$mysql = OpenCon();
	$querry = "select Role_Index from CARP_Player_Roles where Person_Index=$person_index;";
	$result = mysqli_query($mysql,$querry);
	
	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}

	return $rows;
}

function get_show_roles($show_index)
{
	$mysql = OpenCon();
	
	
	$querry = "select Role_Index from CARP_Player_Roles where Show_Index=$show_index ORDER BY `CARP_Player_Roles`.`Type_Index` ASC;";
	$result = mysqli_query($mysql,$querry);
	if(mysqli_num_rows($result) == 0 ){
		return array(0);
	}
	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}
	
	return $rows;
}

function get_show_index($role_index)
{
	$mysql = OpenCon();
	$querry = "select Show_Index from CARP_Player_Roles where Role_Index=$role_index;";
	$result = mysqli_query($mysql,$querry);
	
	return mysqli_fetch_assoc($result)['Show_Index'];
}

function get_show_description($show_index)
{
	$mysql = OpenCon();
	$querry = "select description from CARP_Shows where Show_Index=$show_index;";
	$result = mysqli_query($mysql,$querry);
	
	return mysqli_fetch_assoc($result)['description'];
}

function get_show_name($show_index)
{
	$mysql = OpenCon();
	$querry = "select title from CARP_Shows where Show_Index=$show_index;";
	$result = mysqli_query($mysql,$querry);
	
	return mysqli_fetch_assoc($result)['title'];
}



function get_show_index_name($name)
{
	$mysql = OpenCon();
	$querry = "select Show_Index from CARP_Shows where title='$name';";
	
	$result = mysqli_query($mysql,$querry);
	
	while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
	
    return $results;
}


function get_season($show_index)
{
	$mysql = OpenCon();
	$querry = "select season from CARP_Shows where Show_Index=$show_index;";
	$result = mysqli_query($mysql,$querry);
	
	return mysqli_fetch_assoc($result)['season'];
}

function get_season_year($season)
{
	$mysql = OpenCon();
	$querry = "select start_year from CARP_Seasons where season=$season;";
	$result = mysqli_query($mysql,$querry);
	
	return mysqli_fetch_assoc($result)['start_year'];
}

function get_name_list($name)
{
	$search_param = "$name%";
	$conn = OpenCon();

	$querry = "select * from CARP_Player_List where first LIKE '$search_param' OR last LIKE '$search_param' OR CONCAT(first, ' ',last) LIKE '$search_param';";
	$result = mysqli_query($conn,$querry);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$nameResult[] = $row["first"].' '.$row["last"];
		}
		return $nameResult;
	}
	$conn->close();
}

function get_show_list($show)
{
	$search_param = "%$show%";
	$conn = OpenCon();

	$querry = "select * from CARP_Shows where title LIKE '$search_param'  ORDER BY `CARP_Shows`.`season` ASC;";
	$result = mysqli_query($conn,$querry);
	$showResult = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if(!contains($showResult,$row['title'])){
				$showResult[] = $row['title'];
			}
		}
		return $showResult;
	}
	$conn->close();
}

function add_show($show_index, $show_title,$show_sub_title,$show_writer,$show_description,$show_season)
{
	$conn = OpenCon();
	if(empty($show_index)){
		$querry = "insert into CARP_Shows (title,sub_title,writer,description,season) VALUES ('$show_title','$show_sub_title','$show_writer','$show_description',$show_season);";
	} else {
		$querry = "UPDATE CARP_Shows SET title='$show_title',sub_title='$show_sub_title',writer='$show_writer',description='$show_description',season=$show_season WHERE Show_Index=$show_index";	
	}
	
	$result = mysqli_query($conn,$querry);
	$querry = "select Show_Index FROM CARP_Shows WHERE title='$show_title' AND Season=$show_season;";
	$result = mysqli_query($conn,$querry);
	$show_index = mysqli_fetch_assoc($result)['Show_Index'];

	return $show_index;
	
}

function add_role($role,$role_type,$assistant,$first,$last,$class,$show_index,$season)
{
	$conn = OpenCon();
	$person_index = get_person_index($first." ".$last);
	if(empty($person_index)){
		$querry = "insert into CARP_Player_List (first,last,class) VALUES ('$first','$last','$class');";
		$result = mysqli_query($conn,$querry);
		$person_index = get_person_index($first." ".$last);
	}
	if(empty($assistant)){
		$assistant = 0;
	}
	$querry = "insert into CARP_Player_Roles (part,Season,Show_Index,Person_Index,assistant,Type_Index) VALUES ('$role',$season,$show_index,$person_index,$assistant,$role_type);";
	$result = mysqli_query($conn,$querry);

}
function contains($array, $value){
	foreach($array as $item){
		if($item == $value){
			return true;
		}
	}
	return false;
}
?>