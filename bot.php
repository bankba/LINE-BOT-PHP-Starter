<?php
$access_token = 'xwh67qLsc9eoPaLP1G9VqKtkTmIvZrftOymtg6sWoduZy1VBC+qLAmSnvEJmNY7o9i5uoe3q/GQJ/1/jK5pYMOIPYJKm7Orbqqw7o9ekDdZ4snrnu1nfaAW8BthG+sQofASZTkOYxL+RPhkbYbuF2wdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		
		if ($event['type'] == 'message' && $event['message']['type'] == 'image') {
			
				$replyToken = $event['replyToken'];
				$messages = [
				'type' => 'text',
				'text' => "งานโครตดี...."
			];
				// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			}
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
                        
			$ans="รวย";
			if($text=="สายพิณ")
			   $ans="แก้วนิ่ม";
			else if($text=="ศิโรจน์")
		           $ans="น้อยขุ่ย";
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text." ".$ans
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			/*$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			*/echo $result . "\r\n";
		}
	}
}
echo "OK";
