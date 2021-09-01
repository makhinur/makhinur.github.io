<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
	<div class="container">
  		  <a class="navbar-brand" href="profile.php">Profile</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="tweets.php">Tweets <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="following.php?id=<?php echo $CURRENT_USER['id']; ?>">Following</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="followers.php?id=<?php echo $CURRENT_USER['id']; ?>">Followers</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="messages.php">Messages</a>
		      </li>
		    </ul>
		    <?php 
		    	if($_SERVER['REQUEST_URI']==="/group28/project_blog2/following.php"){
		    ?>
				<form class="form-inline my-2 my-lg-0">
				    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search people</button>
				</form>
			<?php 
				}
			?>

		    <?php if(ONLINE){ ?>
			    <ul class="navbar-nav">
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="profile.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <?php echo $CURRENT_USER['email']; ?>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="settings.php">Settings</a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item font-weight-bold" href="logout.php">Log out</a>
			        </div>
			      </li>
			    </ul>
			<?php } ?>
		  </div>
  	</div>
</nav>