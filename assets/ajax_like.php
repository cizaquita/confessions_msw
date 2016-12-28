<?php

if (isset($_POST["data"]) && strlen($_POST["data"]) > 0) {
	$post_id = $_POST["data"];

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

	$insert_likes = "UPDATE posts SET likes = likes + 1 WHERE id = '$post_id' ;";
	$read_likes = "SELECT likes FROM `posts` WHERE id = '$post_id';";

	if (mysqli_query($conn, $insert_likes)) {
	    //echo "New record created successfully ";
	    $bot_token = "bot195524304:AAHPH7saj1qeKGleWZu9ePpyzgkg_jmu_HQ";
		$chat_id = "-141769525";
		$text = " To delate post follow this link: www.example.com";

		$bot_url = "https://api.telegram.org/" . $bot_token . "/sendMessage?chat_id=" . $chat_id . "&text=You have some new `likes` on site```---```&parse_mode=Markdown&disable_web_page_preview=true";
		//file_get_contents($bot_url);

	} else {
	    //echo "Error: " . $insert_likes . "<br>" . mysqli_error($conn);
	}


	//echo "New record created successfully 2";
	$result = mysqli_query($conn, "SELECT likes FROM `posts` WHERE id = '$post_id';");
	$row = mysqli_fetch_array($result);
	echo $row["likes"];

	//echo "5";

}




?>