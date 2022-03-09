<?php if (session_status() === PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION['user'])) {
	$location = '/admin';
	header('Location: '.$location);
}
?>
<?php 
	require_once('db-config.php');
	if(isset($_POST['phone'])) {
		$mail =  mysqli_real_escape_string($conn, $_POST['email']);
		$phone =  mysqli_real_escape_string($conn, $_POST['phone']);
		$place = mysqli_real_escape_string($conn, $_POST['adres']);
		$brand =  mysqli_real_escape_string($conn, $_POST['brand']);
		
		$sql = 'UPDATE contact_info SET brand = "'.$brand.'", phone = "'.$phone.'", mail = "'.$mail.'", address = "'.$place.'" WHERE id=1';
		
		$conn -> query($sql);
	}

	require_once('./modules/admin-panel-header.html');
?>
<body>
	<?php 
		require_once('./modules/navbar.php');

		if(isset($_SESSION['user']))
		{
			$query = "SELECT * FROM contact_info WHERE id = 1";
			$result = $conn->query($query);
			$row = $result->fetch_assoc();
	?>
	<div class="container-fluid">
		<div class="row">
			<?php 
				require_once('./modules/sidenav.php');
			?>
			<div class="col-9 offset-3" id="main">
				<form action="settings" method="post">
					<div class="form-group">
						<label for="brand">Brand</label>
						<input class="form-control" name="brand" type="text" value="<?php echo $row['brand']?>"/>
					</div>
					<h2>Dane kontaktowe</h2>
					<div class="form-group">
						<label for="phone">Telefon</label>
						<input class="form-control" name="phone" type="tel" value="<?php echo $row['phone']?>"/>
					</div>	
					<div class="form-group">
						<label for="email">Mail</label>
						<input class="form-control" name="email" type="email" value="<?php echo $row['mail']?>"/>
					</div>
					<div class="form-group">
						<label for="adres">Adres</label>
						<input class="form-control" name="adres" type="text" value="<?php echo $row['address']?>"/>
					</div>
					<button class="btn btn-success">Aktualizuj</button>
				</form>
			</div> 
		</div>
		
	</div>
	<?php }?>
</body>
</html>