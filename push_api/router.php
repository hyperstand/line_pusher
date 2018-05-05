<?php
	include 'Process.php';
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	require $_SERVER['DOCUMENT_ROOT'] . '/side/simple_exe/vendor/autoload.php';
	
	$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);
	
	$app->post('/push_api', function (Request $request, Response $response)
	{
		
		$data=json_decode(file_get_contents('php://input'), TRUE);
		
		$my_file = 'log.txt';
		$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
		
		
			foreach ($data['events'] as $event) {
				
				if($event ['type'] == 'message' && $event ['message'] ['type'] == 'text')
				{
				$user_id = $event['source'] ['userId'];
				$replyToken = $event['replyToken'];
				$timeStamp = $event['timestamp'];
				$msg_type=$event ['message'] ['type'];
				$msg_text=$event ['message']['text'];			
				fwrite($handle, "User_id = ".$user_id ." \n");
				fwrite($handle, "replyToken = ".$replyToken." \n");
				fwrite($handle, "Timestamp = ".$timeStamp." \n");
				fwrite($handle, "Message type = ".$msg_type." \n");
				fwrite($handle, "Message text = ".$msg_text." \n");
				fclose($handle);
				}
				
			}
			
			$process=new option();
			$result=$process->push($user_id,$replyToken,$msg_type,$msg_text);
			return $response->withStatus($result);

		
	});
	
	$app->post('/push_api_2',function(Request $request,Response $response){
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<channel access token>');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);
			
			$process=new option();
			$result=$process->push($user_id,$replyToken,$msg_type,$msg_text);
			return $response->withStatus($result);
		});
	$app->run();
?>