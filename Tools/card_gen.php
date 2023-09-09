<?php

if(strpos($text,"/gen") === 0 || strpos($text,'.gen') === 0 || strpos($text,'$gen') === 0 || strpos($text,'?gen') === 0) {

if(empty($text)){
$texta = $quetzal;
}elseif(empty($quetzal)){
$texta = $text;
}

$lista = clean($texta);
$bin = substr($lista, 0, 6);
$fim = json_decode(file_get_contents('https://projectslost.xyz/bin/?bin='.$bin), true);
$level = $fim["level"];
$type = $fim["type"];
$brand = $fim["brand"];
$country = $fim["country"]["name"];
$currency = $fim["country"]["currency"];
$bank = $fim['bank']["name"];
$bankphone = $fim['bank']["phone"];
$emoji = $fim["country"]["flag"];
$pais = $fim["country"]["ISO2"];

function getDatas($string, $start,$end){
    $uno = explode($start, $string);
    $dos = explode($end,$uno[1]);
    return $dos[0];
}

$data = array('cards' => '10', 'text' => $text);

$ch = curl_init('https://arcocloud.alwaysdata.net/APIs/card_gen/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
curl_close($ch);
/*
if(strpos($response, '"status":true,"')){}else{
   $content = ['chat_id' => $chat_id, 'text' => "Credit Card Generator\nFormat Example\n<code>/gen 451014|05|23|xxx</code>\n", 'reply_to_message_id' => $msg_id, 'parse_mode' => "HTML"];
die(SendMessage($content)); 
}*/


$encode = json_decode($response);

foreach($encode->response as $i){
     $a .= ('<code>'.$i.'</code>'."\n");
}

$response = "✨𝐂𝐂𝐒 𝐆𝐄𝐍𝐄𝐑𝐀𝐃𝐀𝐒✨

Info - ↯ <code>$brand</code>  - <code>$type</code> - <code>$level</code> | <code>$bank</code> [<code>$pais $emoji</code>]
- - - - - - - - - - - - - - - - - - - - -
$a ━━━━━━━━━━━━━━━━━━━━━━━━
🤖Bot By: @Ceshack7 - @Gabrielgodzzz";


$content = ['chat_id' => $chat_id, 'text' => "$response", 'reply_to_message_id' => $msg_id, 'parse_mode' => "HTML"];
SendMessage($content);
}