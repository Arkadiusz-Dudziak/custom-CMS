<?php if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once("db-config.php");
require_once('get-layout.php');
$query1 = "SELECT * FROM contact_info WHERE id = 1";
$result1 = $conn->query($query1);
$row1 = $result1->fetch_assoc();
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: <?php echo $colors['mainColor'];?>">
			<a class="navbar-brand" href="/"><?php echo $row1['brand'];?></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav mr-auto">
					<?php 
						

						$nquery = "SELECT id, name, url FROM pages WHERE navigation=1 ORDER BY position";
						$nresult = $conn->query($nquery);
						
						$nid = 0;
						$nname = "";
						
						if ($nresult->num_rows > 0) {
							while($nrow = $nresult->fetch_assoc()) {
								if($nrow['id'] != 1) {
								
					?>
								<li class="nav-item">
									<a class="nav-link" href="./index?page=<?php echo $nrow['url'];?>"><?php echo $nrow['name'];?></a>
								</li>
					<?php
								}
							}
						}
					?>
				</ul>
				<?php 
					if(isset($_SESSION['user']))
					{
				?>
					<a class="btn btn-success" href="/">Zobacz stronę</a>
					<a class="btn btn-primary" href="admin-panel">Admin</a>
					<a class="btn btn-danger" href="logout.php">Wyloguj</a>
				<?php 
					}
				?>
			</div>
</nav>