<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
if(!isset($_SESSION['user'])) {
	$location = '/admin';
	header('Location: '.$location);
}
else {
	require_once('./modules/admin-panel-header.html');
?>

<body>
	
<?php 
		require_once('./modules/navbar.php');

		if(isset($_SESSION['user']))
		{
	?>

	<div class="container-fluid">
		<div class="row">
			<?php 
				require_once('./modules/sidenav.php');
				require_once('db-config.php');
				$new_page = 0;
				if(isset($_GET['new-page'])) {
					$new_page = 1;
					$_POST['new_page'] = 1;
				} else {
					$page_id = $_GET['id'];
					$_SESSION['page_id'] = $page_id;
					$conn -> query("SET NAMES 'utf8'");
					$query = "SELECT * FROM pages WHERE id=$page_id LIMIT 1";
					$result = $conn->query($query);
					$row = $result->fetch_assoc();
				}
			?>
			<div class="col-9 offset-3" id="main">
				<?php if($new_page == 0) {?>
					<a class="btn btn-info" href="/index.php?page=<?php echo $row['url'];?>">Zobacz stronę <img src="./images/magnifier.png"/></a>
					<?php if($page_id != 1) { ?>
						<a class="btn btn-danger" href="/remove-page?id=<?php echo $row['id'];?>">Usuń stronę <img src="./images/delete.png"/></a>
					<?php } ?>
				<?php }?>
				<form method="post" action="edit-page.php?<?php if($new_page) {echo 'new-page=1';} else { echo 'id='.$page_id;}?>">
					<div class="form-group">
						<label for="pageName">Nazwa strony*</label>
						<input class="form-control" required name="pageName" type="text" value="<?php if(!$new_page) echo $row['name'];?>"/>
					</div>

					<div class="form-group">
						<label for="navigation">Uwzględnij w nawigacji</label>
						<input class="form-control" style="width: 40px;" name="navigation" type="checkbox" value="1" <?php if(!$new_page && $row['navigation']) echo "checked";?>/>
					</div>

					<div class="form-group">
						<label for="title">Meta title strony</label>
						<input class="form-control" name="title" type="text" value="<?php if(!$new_page) echo $row['title'];?>"/>
					</div>
					
					<div class="form-group">
					  	<label for="pageDescription">Opis strony</label><textarea class="form-control" name="pageDescription" rows="3" style="resize: none;"><?php if(!$new_page) echo $row['description'];?></textarea>
					</div>
					
					<div class="form-group">
						<label for="robots">Znacznik meta-robots</label>
						<select class="form-control" name="robots">
							<option <?php if (!$new_page && $row['robots']=="index, follow") echo "selected"?> value="index, follow">index, follow</option>
							<option <?php if (!$new_page && $row['robots']=="index, nofollow") echo "selected"?> value="index, nofollow">index, nofollow</option>
							<option <?php if (!$new_page && $row['robots']=="noindex, nofollow") echo "selected"?> value="noindex, nofollow">noindex, nofollow</option>
							<option <?php if (!$new_page && $row['robots']=="noindex, follow") echo "selected"?> value="noindex, follow">noindex, follow</option>
						</select>
					</div>
					

					
					<div class="form-group">
						<label for="siteURL">Przyjazny adres</label>
						<input class="form-control" name="siteURL" type="text" value="<?php if(!$new_page) echo $row['url'];?>" 
								placeholder="Uzupełnij jeśli ma być inny niż nazwa strony"/>
					</div>
						
					<div class="form-group">
					  <label for="inner_HTML">Edytor HTML</label>
					  <textarea class="form-control" name="inner_HTML" id="inner_HTML" rows="10" cols="80" placeholder="Umieść tutaj kod HTML swojej strony"><?php if(!$new_page) echo $row['inner_HTML'];?></textarea>
						<script>
							CKEDITOR.replace( 'inner_HTML' );
						</script>
					</div>
					
					<button class="btn btn-success" type="submit">
						<?php 
							if(!$new_page) {echo "Aktualizuj";}
							else {echo "Dodaj";}
						?>
					</button>
				</form>
			</div> 
		</div>
		
	</div>

	
</body>
</html>

<?php
		//form-action 
		if(isset($_POST['pageName']))
		{
			$pageName =  mysqli_real_escape_string($conn, $_POST['pageName']);
			$navigation = 0;
			if(!empty($_POST['navigation'])) {
				$navigation = 1;
			}
			$pageDescription =  mysqli_real_escape_string($conn, $_POST['pageDescription']);
			$inner_HTML = $_POST['inner_HTML'];
			$siteURL = mysqli_real_escape_string($conn, $_POST['siteURL']);
			$robots = mysqli_real_escape_string($conn, $_POST['robots']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			
			if($siteURL == "") {
				$siteURL = strtolower(str_replace(" ","-",$pageName));
			}		
		
			if(isset($_POST['new_page']) && $_POST['new_page']==1) {
				$pdo_sql = "INSERT INTO pages (name, navigation, title, inner_HTML, description, url, robots) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$pdo->prepare($pdo_sql)->execute([$pageName, $navigation, $title, $inner_HTML, $pageDescription, $siteURL, $robots]);	
				echo '<script type="text/javascript">window.location = "/admin-panel"</script>';
			}
			else {				
				$pdo_sql = "UPDATE pages SET name=?, navigation=?, title=?, inner_HTML=?, description=?, url=?, robots=? WHERE id=?";
				$pdo->prepare($pdo_sql)->execute([$pageName, $navigation, $title, $inner_HTML, $pageDescription, $siteURL, $robots , $page_id]);
				echo "<meta http-equiv='refresh' content='0'>";
			}
			
			// if($sql) {
				// if ($conn -> query($sql) === TRUE) {
				// echo "<meta http-equiv='refresh' content='0'>";
				// } else {
					// echo "error". $conn->error;
				// }
			// }
			
		}
	}
}
?>