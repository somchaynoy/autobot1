<?php

require_once('./vendor/autoload.php');

//Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\StickerMessageBuilder;

//Token
$channel_token='r5GTCeVRSWqJyCtiT8YHE9n4I1+BYRSh4XXEJn7DlrDC+2MZySV8m4Thsz9NOZlh0wq2E4IhN3Hl/yhqWS4rDAIX7/Q6oxzUYhMPO5aqGkDbLhyyvY0l4RkwSblBzQVtD2+8uJotM8AnhUzsVeSXNgdB04t89/1O/w1cDnyilFU=;

$channel_secret='7892716414d782ce55cb0076ed4d536b';

//Get
$content=file_get_contents('php://input');
$events=json_decode($content, true);

if(!is_null($events['events'])){
	
	//Loop
	foreach($events['events']as $event){
		
		//Get
		$replyToken=$event['replyToken'];
		
		//Sticker
		$packageID=1;
		$stickerID=410;
		
		$httpClient=new CurlHTTPClient($channel_token);
		$bot=new LINEBot($httpClient, array('channelSecret'=>$channel_secret));
		
		$textMessageBuilder=new StickerMessageBuilder($packageID, $stickerID);
		$response=$bot->replyMessage($replyToken, $textMessageBuilder);
			
	}
}
echo"OK";
