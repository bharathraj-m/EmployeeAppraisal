<?php
		session_start();

		if (!isset($_SESSION['eid'])) {
			header("Location: index.php");
		} else if(isset($_SESSION['eid'])!="") {
			header("Location: home.php");
		}

		if (isset($_GET['logout'])) {
			unset($_SESSION['eid']);
			session_unset();
			session_destroy();
			header("Location: index.php");
			exit;
		} ?>
