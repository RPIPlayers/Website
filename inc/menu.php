<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top " role="navigation">
<div class="container">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
		<i class="fa fa-bars"></i>
		</button>
		<a class="navbar-brand page-scroll" href="<?php echo "index"?>">
		The RPI Players </a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown">
                <button class="btn btn-default-menu navbar-btn dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">About Us
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" href=<?php echo "history"?>>History</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" href=<?php echo "comingsoon"?>>Meet the Players</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" href=<?php echo "officers"?>>Officers</a></li>
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a role="menuitem" href=<?php echo "search"?>>Players Archive</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <button class="btn btn-default-menu navbar-btn dropdown-toggle" type="button" id="menu2" data-toggle="dropdown">Productions
                    <span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                    <li role="presentation"><a role="menuitem" href=<?php echo "current"?>>Current Season</a></li>
					<li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" href=<?php echo "past"?>>Past Seasons</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" href=<?php echo "reservation"?>>Reserve Tickets</a></li>

                </ul>
            </li>
			<li>
                <a href=<?php echo "resources"?>>Resources</a>
			</li>
			<li>
                <a href=<?php echo "donate"?>>Donate</a>
			</li>
			<li>
                <a href=<?php echo "contact"?>>Contact</a>
			</li>

		</ul>
	</div>
	<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>