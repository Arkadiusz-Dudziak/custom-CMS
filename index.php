<?php if (session_status() === PHP_SESSION_NONE) { session_start(); }?>
<?php 
	require_once('db-config.php');

	if(isset($_GET['page']))
	{
		$page_name = $_GET['page'];
		$query = 'SELECT * FROM pages WHERE url="'.$page_name.'" LIMIT 1';
	} else {
		$query = "SELECT * FROM pages WHERE id=1 LIMIT 1";
	}

	$brand_query = "SELECT brand FROM contact_info WHERE id=1";

	$row = $conn->query($query)->fetch_assoc();
	$row_brand = $conn->query($brand_query)->fetch_assoc();
?>
<!doctype html>

<html lang="pl">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="robots" content="<?php echo $row['robots'];?>"/>

  <title><?php echo $row['title']; if($row_brand['brand']) echo " - ".$row_brand['brand']?></title>
  <meta name="description" content="<?php echo $row['description'];?>"/>
  
  <link rel="icon" type="image/png" href="favicon.png"/>
  
  <link href="style.css" rel="stylesheet"/>
	<script src="jquery-3.6.0.min.js"></script>
	<link href=".\bootstrap-4.3.1-dist\css\bootstrap.css" rel="stylesheet"/>
	<script src=".\bootstrap-4.3.1-dist\js\bootstrap.js"></script>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<?php require('get-layout.php');?>

<body style="background-color: <?php echo $colors['bgColor'];?>;">
	<?php 
		require_once('./modules/navbar.php');
	?>
	<div class="container landing-page-container" style="color: <?php echo $colors['fontColor'];?>;">

		<?php
			echo $row['inner_HTML'];
		?>
  </div>
<?php require_once('./modules/footer.php');?>
</footer>
  

</body>
</html>
