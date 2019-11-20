<?php 

    session_start();

    include "function/helper.php";
    
    unset($_SESSION['user_id']);
    unset($_SESSION['nama']);
    unset($_SESSION['level']);

    direct(BASE_URL."index.php");

    
?>