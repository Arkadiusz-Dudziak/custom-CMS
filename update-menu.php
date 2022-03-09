<?php if (session_status() === PHP_SESSION_NONE) { session_start(); }
    if(!isset($_SESSION['user'])) {
        $location = '/admin';
        header('Location: '.$location);
    }
    if (isset($_COOKIE["menuList1"])) 
    {
        $arr1txt = $_COOKIE["menuList1"];
        $arr = explode (",", $arr1txt); 
        $i = 0;
        require_once("db-config.php");
        foreach($arr as $value) {
            $sql = 'UPDATE pages SET position = "'.$i.'" WHERE id = "'.$value.'"';
            $conn -> query($sql);
            $i++;
        }
    }
    $location = '/menu';
    header('Location: '.$location);
?>