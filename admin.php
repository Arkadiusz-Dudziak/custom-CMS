<?php 
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	if(isset($_POST['login']) && isset($_POST['password']))
	{
		if($_POST['login'] == 'admin' && $_POST['password'] == 'admin')
		{
			$_SESSION['user'] = $_POST['login'];
		}
	}

	if(isset($_SESSION['user'])) {
		$adminPanel = '/admin-panel';
		header('Location: '.$adminPanel);
	}
	
	require_once('./modules/admin-panel-header.html');
?>

<body>
	<div class="container">
		<div class="form-container form-div">
			<form method="post" action="admin.php">
				<div class="form-group">
					<label for="login">Login</label>
					<input class="form-control" type="text" name="login" required/>
				</div>
				<div class="form-group">
					<label for="password">Hasło</label>
					<input class="form-control" type="password" name="password" required/>
				</div>
				<button class="btn btn-primary" type="submit">Zaloguj się</button>
			</form>
		</div>
	</div>
</body>