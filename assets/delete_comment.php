<?php
	$unique_id = $_GET["id"];


	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "msw_secrets";
	$conn = mysqli_connect($servername, $username, $password,$database);
	if (!$conn) {
	    die("Connection failed during the reason: " . mysqli_connect_error());
	} else {
		//echo "Connected successfully to database: " . $database;
	}

	$sql = "DELETE FROM `comments` WHERE comment_id='$unique_id';";


	if (mysqli_query($conn, $sql)) {
	    
		$bot_token = "bot195524304:AAHPH7saj1qeKGleWZu9ePpyzgkg_jmu_HQ";
		$chat_id = "-141769525";
		$text = "Post delated.";

		$bot_url = "https://api.telegram.org/" . $bot_token . "/sendMessage?chat_id=" . $chat_id . "&text=*Comment ID: " . $unique_id . " deleted*&parse_mode=Markdown";
		//file_get_contents($bot_url);

	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	
	
	
?>