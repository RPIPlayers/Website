<?php
function display_gallery(){
	$files = scandir('img/gallery');
	$output='';
	foreach ($files as $file){
		if($file == '.' || $file=='..'){
			continue;
		}
		$image = "<div class='gallery'>
	<button type='button' data-toggle='modal' data-target='#$file'>
		<img src='/img/gallery/$file' alt='Image' width='600' height='400'>
	</button>
	</div>";
		$output=$output.$image;
	}
	return $output;
}

function display_modal(){
	$files = scandir('img/gallery/');
	$output='';
	foreach ($files as $file){
		if($file == '.' || $file=='..'){
			continue;
		}
		$modal ="<!-- Modal -->
	  <div class='modal fade' id='$file' role='dialog'>
	    <div class='modal-dialog'>
	    
	      <!-- Modal content-->
	      <div class='modal-content'>
	 
	        <div class='modal-body'>
	              <img src='/img/gallery/1.jpg' alt='Cinque Terre'>
	          </div>
	    </div>
	 
	      </div>
	      
	    </div>";
		$output=$output.$modal;
	}
	return $output;
		
}

?>