<?php
	include '../common_function.php';
	session_close();
	redirect_link('You are sucessfully logout.!',BASE_URL.'signin.php');
?>