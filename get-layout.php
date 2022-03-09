<?php 
    $query = "SELECT * FROM layout";
    $result = $conn->query($query);
    $colors = $result->fetch_assoc();
?>