<?php

   	$user = 'cvsunaic_user';
	$host = 'localhost';
	$password = 'Hhis68!3';
	$db_name = 'cvsunaic_cvsudatabase123qwe';

// 	$user = 'root';
// 	$host = 'localhost'; // Corrected order of host and user
// 	$password = '';
// 	$db_name = 'cvsudatabase123qwe_test';
		
	// Create connection
	$conn = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($conn) . '. Could not connect to server.');
	?>