<?php
if (session_status() === PHP_SESSION_NONE) {
		session_start();	
	}
	if(!isset($_SESSION['user'])){
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
			require_once('./modules/sidenav.php');
	?>

	<div class="container-fluid">
		<div class="row">
		<div class="col-9 offset-3" id="main">

				<h1>Zestawienie stron w CMSie: </h1>
				<a class="btn btn-success" href="./edit-page.php?new-page=1">Dodaj nową stronę</a> 
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nazwa</th>
							<th>Edytuj</th>
							<th>Usuń</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
			<?php 
				
				require_once("db-config.php");

				$query = "SELECT id, name, url FROM pages";
				$result = $conn->query($query);
				
				$id = 0;
				$name = "";
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$id = $row["id"];
						$name = $row["name"];
						?>
						<tr>
							<th scope="row"><?php echo $id?></th>
							<td><?php echo $name?></td>
							<td><a href="./edit-page?id=<?php echo $id;?>"> <img src="./images/edit.png"/> </a> </td>
							<td>
							<?php 
								if($id != 1){
							?>
								<a href="/remove-page?id=<?php echo $row['id'];?>"> <img src="./images/delete.png"/> </a> </td>
							<?php 
								}
							?>
							</td>	
							<td>
								<a href="./index.php?page=<?php echo $row['url'];?>" class="btn btn-info">Podgląd</a>
							</td>
						</tr>			
			<?php
					}
				}
			?>
			</tbody>
			</table>
			</div> 
		</div>
		
	</div>
	
</body>
</html>
<?php } }?>