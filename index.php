<?php

include_once 'vkConfig.php';
include_once 'vkPars.php';
//include_once 'sendTelegram.php';
include_once 'telegramConfig.php';

$vkPars = new vkPars();
$text = $vkPars->news($hashTag,$id, $count, $token, $group_id);
if($text!=null) {
    $result = file_get_contents("https://api.telegram.org/bot" . $telegramToken . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($text));
}