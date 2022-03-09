<?php if (session_status() === PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION['user'])) {
	$location = '/admin';
	header('Location: '.$location);
}
else {
    require_once('./modules/admin-panel-header.html');
    require_once("db-config.php");
    $query = "SELECT id, name, url FROM pages WHERE navigation=1 ORDER BY position";
    $resultM = $conn->query($query);
?>
<body>
<?php require_once('./modules/navbar.php');
 require_once('./modules/sidenav.php'); ?>
<div class="container-fluid">
    <div class="row">
    <div class="col-9 offset-3" id="main">
        <div class="menu-list-wrapper" style="position: relative;">
            <ul id="sortable">
                <?php 
                if ($resultM->num_rows > 0) {
					while($row = $resultM->fetch_assoc()) 
                    {
                        if($row['id']!=1) 
                        {
                ?>
                    <li data-index-number="<?php echo $row['id'];?>" class="ui-state-default"><?php echo $row['name']?></li>
                <?php
                        }
                    }
                }
                ?>
            </ul>
            <button onclick="updateMenuOrder()" class="btn btn-success">Aktualizuj</button>
        </div>
        
    </div>
</div>
<div>
<script src="javascript.js"></script>
</body>
</html>
<?php }?>