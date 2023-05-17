<?php
	$conn = new mysqli('18.136.105.108:81', 'root', '', 'gymsystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>