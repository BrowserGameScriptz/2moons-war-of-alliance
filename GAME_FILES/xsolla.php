<?php
define('MODE', 'BANNER');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);
require 'includes/common.php';
require 'includes/libs/xsolla/xsolla-autoloader.php';

use Xsolla\SDK\Webhook\WebhookServer;
use Symfony\Component\HttpFoundation\Request;
use Xsolla\SDK\Webhook\Message\Message;
use Xsolla\SDK\Exception\Webhook\XsollaWebhookException;
use Xsolla\SDK\Exception\Webhook\InvalidUserException;

$request = Request::createFromGlobals();
$request->setTrustedProxies(array('159.255.220.240/28, 185.30.20.16/29, 185.30.21.0/24, 185.30.21.16/29', '2a02:a03f:3c1b:cd00:1482:89a1:5424:8f28', '54.36.61.29', '109.134.53.117'));
 
$callback = function (Message $message) {
    switch ($message->getNotificationType()) {
        case Message::USER_VALIDATION:
			$userArray 		= $message->getUser();
			$userId 		= $message->getUserId();
			$messageArray 	= $message->toArray();
			
			$sql	= "SELECT * FROM %%USERS%% WHERE id = :userId;";
			$USER	= database::get()->selectSingle($sql, array(
				':userId'	=> $userId
			));
			
			if(empty($USER)){
				throw new InvalidUserException('USER NOT FOUND');
			}
            break;
        case Message::PAYMENT:
			$userArray 				= $message->getUser();
			$userId 				= $message->getUserId();
            $paymentDetailsArray 	= $message->getPurchase(); 
            $isDryRun 				= $message->isDryRun();
			$customParametersArray 	= $message->getCustomParameters();
			$getTranId 				= $message->getPaymentId();
            $messageArray 			= $message->toArray();
			
			$sql	= 'SELECT * FROM %%USERS%% WHERE id = :userId;';
			$INFO1 = database::get()->selectSingle($sql, array(
				':userId'	=> $userId
			));
			
			$Message = 'Xsolla payment was successful. <br><span style="color:#F30; font-weight:bold;">'.pretty_number($paymentDetailsArray['virtual_currency']['quantity']).'</span> anti matter have been credited to your account.';
			PlayerUtil::sendMessage($userId, '', 'System', 4, 'Anti Matter Order', $Message, TIMESTAMP);
			
			$sql	= "UPDATE %%USERS%% SET antimatter = antimatter + :antimatter WHERE id = :userId;";
			database::get()->update($sql, array(
				':antimatter'	=> $paymentDetailsArray['virtual_currency']['quantity'],
				':userId'		=> $userId
			));
			
			$sql = "INSERT INTO %%PURCHASE%% SET userID = :userID, time = :time, pinCode = :pinCode, pinPrice = :pinPrice, pinCredits = :pinCredits, pinType = :pinType, pinAprouved = :pinAprouved, paystatus = :paystatus, payupdate = :payupdate;";
			database::get()->insert($sql, array(
				':userID'			=> $userId,
				':time'				=> TIMESTAMP,
				':pinCode'			=> $getTranId,
				':pinPrice'			=> $paymentDetailsArray['virtual_currency']['amount'],
				':pinCredits'		=> $paymentDetailsArray['virtual_currency']['quantity'],
				':pinType'			=> 'xsolla',
				':pinAprouved'		=> 1,
				':paystatus'		=> "Completed",
				':payupdate'		=> TIMESTAMP
			));
						
        break;
        case Message::USER_BALANCE:
            /** @var Xsolla\SDK\Webhook\Message\RefundMessage $message */
            // TODO if you cannot handle the refund, you should throw Xsolla\SDK\Exception\Webhook\XsollaWebhookException
            break;
        default:
            throw new XsollaWebhookException('Notification type not implemented');
    }
};

$webhookServer = WebhookServer::create($callback, 'HAsdNcMpvqOTVAK2');
$webhookServer->start();