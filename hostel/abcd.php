<?php 
			require_once 'includes/config.php';
			session_start();
			$id=$_SESSION['id'];
			echo $id;
			?>