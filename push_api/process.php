<?php
	class option{
		
		private $handle;
		public function __construct(){
					$my_file = 'log.txt';
					$this->handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
		
		}
		
		public function push($user_id,$replyToken,$msg_type,$msg_text){	
				
			$url='https://api.line.me/v2/bot/message/reply';
			

			
			$data = array('replyToken' => $replyToken,'messages' =>[array(type=>'text',text=>'xxxxxx'),array(type=>'text',text=>'xxxxxx')]);
			
			$this->Exec_url($url,$data);
			
			return 200;
			
		}
		
		
		
		
		private function Exec_url($url,$data){
/* 				fwrite($this->handle, "running_handle");
				fclose($this->handle); */
				
			$post=json_encode($data);
			$auth_key="disCSm2wWXEu1Mga9JAZtOvWgrsFZ2TBRTHCm2qjN8o4yGhbFAtLZOahspbmJAudJi8LIZIUFxIZzoJ0J5wTj86g/adj1PRCijd9Txa+LZmoNpeotHoSouBOfIK73wFu58lZxwa6Kxaz/Co2x0QWJQdB04t89/1O/w1cDnyilFU=";
			
			
			
			
	
			
			      $curl = curl_init() ;
				  curl_setopt($curl, CURLOPT_URL, "https://api.line.me/v2/bot/message/reply") ;
				  curl_setopt($curl, CURLOPT_HEADER, true);
				  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				  curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $auth_key));
				  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				  curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
				  $response = curl_exec($curl);
			
				fwrite($this->handle, "response = ".json_encode($response,TRUE));
				fclose($this->handle);
			
			
			
			

			
			return($ch);
		}
	}
?>