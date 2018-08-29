<?php 
if (isset($_GET['logout'])){
	session_destroy();
    unset($_SESSION['u_id']);
    header("Location:index.php");
}

?>