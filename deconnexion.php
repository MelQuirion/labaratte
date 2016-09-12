<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	unset($_SESSION['courriel']);
	header('Location:index.php');
	exit();
?>