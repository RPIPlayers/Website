<!-- Footer -->

<footer>
<div class="container text-center">
	<p class="credits">
	<?php
		if ( isset( $_SESSION['user_id'] ) ) {
			echo "<a href=logout> logout </a>";
		} else {
			echo "<a href=login> login </a>";
		}
	?>
	</p>
	<p class="credits">
		Copyright &copy; <?php echo date("Y");?> RPI Players<br/>
	</p>
</div>

</footer>