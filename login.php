<?php
session_start();
include("inc/root.php");

if ( isset( $_SESSION['user_id'] ) ) {
   header("location: admin.php");
} 

if ( ! empty( $_POST ) ) {
	
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
		
        // Getting submitted user data from database
        $con = OpenCon();
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->password ) ) {
			$_SESSION['user_id'] = $user->username;
			header("location: admin.php");
    	}
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
include("inc/header.php"); //head
//include("inc/menu.php"); //navigation


?>
 
<section id="contact">
<div class="container content-section text-left">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 text-center">
            <h2>Login</h2>
        </div>
        <div class="col-lg-8 col-lg-offset-2">
            <div class="done">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					Your message has been sent. Thank you!
				</div>
			</div>
			<form method="post" action="" id="contactform">
				<div class="form">
					<input type="text" name="username" placeholder="Name *">
					<input type="password" name="password" placeholder="Password *">
					<input type="submit" id="submit" class="clearfix btn" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>

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
<body onload="displayMenu()">
</body>
</html>

