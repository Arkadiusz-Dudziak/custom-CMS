<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['no'])) {
    $location = '/admin-panel';
    header('Location: '.$location);
}
if(isset($_POST['yes'])) {
    require_once('db-config.php');
    $sql = "DELETE FROM pages WHERE id = ?";
    $pdo->prepare($sql)->execute([$_GET['id']]);
    $location = '/admin-panel';
    header('Location: '.$location);
} 
if(!isset($_SESSION['user']) || !isset($_GET['id']) || $_GET['id'] == 1) {
	$location = '/admin';
	header('Location: '.$location);
}
else {
?>
<!doctype html>

<html lang="pl">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="robots" content="noindex"/>

  <title>Panel Administratora</title>
  <meta name="description" content="Prosty CMS, stworzony na potrzeby projektu z PHP, mySQL"/>
  
  <link rel="icon" type="image/png" href="favicon.png"/>
  
  <link href="style.css" rel="stylesheet"/>
	<script src="jquery-3.6.0.min.js"></script>
	<link href=".\bootstrap-4.3.1-dist\css\bootstrap.css" rel="stylesheet"/>
	<script src=".\bootstrap-4.3.1-dist\js\bootstrap.js"></script>
</head>
<body>
    <?php
        require_once('./modules/navbar.php');
    ?>
    <div class="container-fluid">
		<div class="row">
			<?php 
				require_once('./modules/sidenav.php');
            ?>
	<div class="container">
		<div class="form-container form-div">
			<form method="post" action="remove-page?id=<?php echo $_GET['id'];?>">
                <p>Czy na pewno chcesz usunąć stronę o id <?php echo $_GET['id'];?>?</p>
                <button class="btn-warning" type="submit" name="yes">TAK</button>
                <button class="btn-info" type="submit" name="no">NIE</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php  
    }
?>