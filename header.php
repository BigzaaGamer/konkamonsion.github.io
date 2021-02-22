<?php include ('session.php');?>
<style>
	.head-view{
		display:flex;
		justify-content: space-around;
	}
	a{text-decoration: none;}
	#menu a{margin:10px;padding:10px}
	</style>
	<div id="header">
		<div class="head-view">

				<div id="home">
				<a href="home.php" title="Biobook"><b>Social Platform</b></a>
</div>
	<div id="menu">
				<a href="timeline.php?user_id=<?php echo $id?>" title="<?php echo $username ?>"><?php echo $username ?></a>
				<a href="home.php" title="Home">Home</a>
				<a href="profile.php" title="Home">Profile</label></a>
				<a href="photos.php" title="Settings">Photos</a>
				<a href="logout.php" title="Log out"><button class="btn-sign-in" value="Log out">Log out</button></a>
			</ul>
		</div>
	</div>