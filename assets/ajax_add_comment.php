<?php

	$comment = $_POST["comment"];
	$post_id = $_POST["unique_id"];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "msw_secrets";
	$conn = mysqli_connect($servername, $username, $password,$database);
	if (!$conn) {
	    die("Connection failed during the reason: " . mysqli_connect_error());
	    //echo "Connection failed during the reason: " . mysqli_connect_error();
	} else {
		//echo "Connected successfully to database: " . $database;
	}

	$comment_id = rand(10000,1000000);

	$insert_comments = "INSERT INTO `comments` (comment, unique_post_id, date, time, comment_id) VALUES ('$comment', '$post_id', CURDATE(), CURTIME(), '$comment_id');";
	$read_comments = "SELECT * FROM `comments` WHERE unique_post_id = '$post_id' ORDER BY `id` DESC;";

	if (mysqli_query($conn, $insert_comments)) {
	    //echo "New record created successfully ";
	    $bot_token = "bot195524304:AAHPH7saj1qeKGleWZu9ePpyzgkg_jmu_HQ";
		$chat_id = "-141769525";
		$text = " To delete post follow this link: www.example.com";//$txt . " To delete post follow this link: www.example.com";

		$bot_url = "https://api.telegram.org/" . $bot_token . "/sendMessage?chat_id=" . $chat_id . "&text=`New comment on post ID: " . $post_id . "`, to open post [click here](http://32avzir6unmcg2y2.onion/single_post.php?pid=" . $post_id . ") ```---``` Comment: ". $comment ."```---```To delete comment [click here](http://32avzir6unmcg2y2.onion/assets/delete_comment.php?id=" . $comment_id .") &parse_mode=Markdown&disable_web_page_preview=true";
		file_get_contents($bot_url);
	} else {
	    echo "Error: " . $insert_comments . "<br>" . mysqli_error($conn);
	}


	//echo "New record created successfully 2";
	$result = mysqli_query($conn, $read_comments);
	//$row = mysqli_fetch_array($result);

	while ($row = mysqli_fetch_array($result)) {
		echo "<tr><td width='80%'>" . $row["comment"] . "</td><td  align='center'>" . $row["date"] . "<br>" . $row["time"] . "</td></td/>";
	}

	
?>