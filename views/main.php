<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NoteTaker</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/style.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/bootstrap.css">

</head>
<body>
	<div class="container-bg">
		<nav class="navbar navbar-expand-lg navbar-dark  sticky-top bg-dark">
			<ul class="navbar-nav mr-auto">
				<a href="index.php" class="navbar-brand">Notetaker</a>
    		</ul>
			
				<ul class="navbar-nav navbar-right">
					<?php if (isset($_SESSION['is_logged_in'])): ?>
						<li class="nav-item"><a class="nav-link" href=""><?php echo $_SESSION['user_data']['username']; ?></a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Log Out</a></li>
	
					<?php else: ?>
						<li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Log in</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">Sign Up</a></li>
					<?php endif ?>
	    		</ul>
		</nav>
		<div class="container-fluid">
			<?php require($view); ?>
      	</div>
    </div>
</body>
</html>

