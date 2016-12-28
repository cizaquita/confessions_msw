<?php


$network = $_POST["network"];

$bot_token = "bot195524304:AAHPH7saj1qeKGleWZu9ePpyzgkg_jmu_HQ";
$chat_id = "-141769525";
$text = " You have share on ";

$bot_url = "https://api.telegram.org/" . $bot_token . "/sendMessage?chat_id=" . $chat_id . "&text=Someone shared on " . $network . "&parse_mode=Markdown&disable_web_page_preview=true";
//file_get_contents($bot_url);



?>