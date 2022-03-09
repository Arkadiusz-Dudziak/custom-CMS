<?php if (session_status() === PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION['user'])) {
	$location = '/admin';
	header('Location: '.$location);
}
	require_once('./modules/admin-panel-header.html');
	require_once('db-config.php');
	$query = "SELECT * FROM layout";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();

	$cssFileContent = file_get_contents('./style.css');
?>

<body>
	<?php 
		require_once('./modules/navbar.php');

	?>
	<div class="container-fluid">
		<div class="row">
			<?php 
				require_once('./modules/sidenav.php');
			?>
			<div class="col-9 offset-3" id="main">
				<form method="post" action="layout.php">
					<div class="form-group">
						<label for="mainColor">Belka nawigacji</label>
						<input name="mainColor" type="color" value="<?php echo $row['mainColor'];?>"/>
					<div>
					<div class="form-group">
						<label for="fontColor">Czcionka</label>
						<input name="fontColor" type="color" value="<?php echo $row['fontColor'];?>"/>
					</div>
					<div class="form-group">
						<label for="bgColor">Tło strony</label>
						<input name="bgColor" type="color" value="<?php echo $row['bgColor'];?>"/>
					</div>

					<div class="form-group">
						<label for="footerColor">Stopka: kolor czcionki</label>
						<input name="footerColor" type="color" value="<?php echo $row['footerColor'];?>"/>
					</div>
					<div class="form-group">
						<label for="footerBgColor">Stopka: kolor tła</label>
						<input name="footerBgColor" type="color" value="<?php echo $row['footerBgColor'];?>"/>
					</div>
					<div class="form-group">
						<label>Edytuj plik CSS</label>
						<textarea rows="20" class="form-control" name="cssContent"><?php echo $cssFileContent?></textarea>
					</div>
				</form>
				<button class="btn btn-success">Zapisz zmiany</button>
			</div> 
		</div>
		
	</div>
</body>
</html>

<?php 
	if(isset($_POST['mainColor'])){
		$mainColor =  mysqli_real_escape_string($conn, $_POST['mainColor']);
		$bgColor =  mysqli_real_escape_string($conn, $_POST['bgColor']);
		$fontColor = mysqli_real_escape_string($conn, $_POST['fontColor']);
		$footerColor = mysqli_real_escape_string($conn, $_POST['footerColor']);
		$footerBgColor = mysqli_real_escape_string($conn, $_POST['footerBgColor']);

		$pdo_sql = "UPDATE layout SET mainColor=?, bgColor=?, fontColor=?, footerColor=?, footerBgColor=?";
		$pdo->prepare($pdo_sql)->execute([$mainColor, $bgColor, $fontColor, $footerColor, $footerBgColor]);


		$cssFile = fopen("./style.css", "w") or die("Unable to open file!");
		fwrite($cssFile, $_POST['cssContent']);
		fclose($cssFile);
		echo "<meta http-equiv='refresh' content='0'>";
	}
?>