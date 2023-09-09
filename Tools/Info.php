<?php

if(strpos($text,"/myinfo") === 0 || strpos($text,'/myinfo@MikazaChkBot') === 0){

require_once 'data.php';
    $sql = "SELECT planexpiry FROM administrar WHERE id='$user_id'";

    $result = mysqli_query(mysqlcon(), $sql);
    
    $json_array = [];    
    while ($row = mysqli_fetch_assoc($result)) {
      $json_array[] = $row;
    }
    
    $final2 = json_encode($json_array);
    
    
    $file = fopen("test.txt","w");
    echo fwrite($file,$message_id);
    fclose($file);
    
    $planexpiry = anicap($final2, '"planexpiry":"','"');
    mysqli_close(mysqlcon());
    
    $sql = "SELECT * FROM administrar WHERE id='$user_id'";
    $result = mysqli_query(mysqlcon(), $sql);
    
    $json_array = [];
    
    
    while ($row = mysqli_fetch_assoc($result)) {
      $json_array[] = $row;
    }
    
    $final2 = json_encode($json_array);
    
    $credits = anicap($final2, '"creditos":"','"');
    mysqli_close(mysqlcon());
    
    $sql = "SELECT plan FROM administrar WHERE id='$user_id'";
    $result = mysqli_query(mysqlcon(), $sql);
    
    $json_array = [];
    
    
    while ($row = mysqli_fetch_assoc($result)) {
      $json_array[] = $row;
    }
    
    $final2 = json_encode($json_array);
    
    $plan = anicap($final2, '"plan":"','"');
    mysqli_close(mysqlcon());
    
    $now = time();
      if ($planexpiry < $now && $planexpiry == 0) {
    }
elseif ($planexpiry < $now && $plan != "Free User") {
    
    // Check connection
    // Attempt create database query execution
    $sql = "UPDATE `administrar` SET `plan` = 'Free User' WHERE `administrar`.`id` = '$user_id';";
    $result = mysqli_query(mysqlcon(), $sql);
    // Close connection
    mysqli_close(mysqlcon());
    
    
    $sql = "UPDATE `administrar` SET `planexpiry` = '0' WHERE `administrar`.`id` = '$user_id';";
    $result = mysqli_query(mysqlcon(), $sql);
    // Close connection
    mysqli_close(mysqlcon());


    $content = ['chat_id' => $chat_id, 'text' => "$premium_expired", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
            $m1  = SendMessage($content);
            exit();
    }
    $SQL = "SELECT * FROM `authorize` WHERE chats=".$chat_id;
    $CONSULTA = mysqli_query(mysqlcon(),$SQL);
    $f = mysqli_num_rows($CONSULTA);
    $json_array = [];


    while ($row = mysqli_fetch_assoc($CONSULTA)) {
    $json_array[] = $row;
    }

    $final2 = json_encode($json_array);

    $chats =anicap($final2, '"chats":"','"');
    if($chats != $chat_id and $ctype == "supergroup"){
        $content = ['chat_id' => $chat_id, 'text' => "$group_not_allowed", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];


        $m1  = SendMessage($content);
        exit();
    }
    else{
        
       
    }
    $SQL = "SELECT * FROM `administrar` WHERE id=".$user_id;
    $CONSULTA = mysqli_query(mysqlcon(),$SQL);
    $json_array = [];


    while ($row = mysqli_fetch_assoc($CONSULTA)) {
    $json_array[] = $row;
    }

    $final2 = json_encode($json_array);

    $plan =anicap($final2, '"plan":"','"');

   
    mysqli_close(mysqlcon());
    $SQL = "SELECT * FROM `administrar` WHERE plan=".$plan;
    if(empty($plan)){
        $content = ['chat_id' => $chat_id, 'text' => "$not_registered", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
            $m1  = SendMessage($content);
            exit();
    }else{
        
    }
    if($plan == "Free User" and $ctype == "private"){
        $content = ['chat_id' => $chat_id, 'text' => "$not_allowed", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
            $m1  = SendMessage($content);
            exit();
    }else{
        
    }
    $SQL = "SELECT * FROM `administrar` WHERE id=".$user_id;
    $CONSULTA = mysqli_query(mysqlcon(),$SQL);
    $f = mysqli_num_rows($CONSULTA);

    if($f > 0)
    {} else{
        $content = ['chat_id' => $chat_id, 'text' => "$not_registered", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
        $m1  = SendMessage($content);
        exit;
    }
    if($planexpiry == "0"){
        $expiry = "";
    }else{
        $expiry = date('l jS \of F Y h:i:s A',$planexpiry);
    
    }
    if(empty ($username)){
        $uusername = "Please set a username";
    }else{
if($plan == "Free User"){
$antispam = "60s";
}if($plan != "Free User"){
$antispam = "40s";
}
        $uusername = "@$username";

    $content = ['chat_id' => $chat_id, 'video' => 'mikazausers.alwaysdata.net/project/info.gif.mp4', 'caption' => "<b>[↯] 𝐔𝐬𝐞𝐫 𝐈𝐃 : <code>$user_id</code>\n[↯] 𝐍𝐚𝐦𝐞 : <i>$ufname</i>\n[↯] 𝐔𝐬𝐞𝐫𝐧𝐚𝐦𝐞 : $uusername\n[↯] 𝐑𝐚𝐧𝐠𝐨 : $plan\n[↯] 𝐂𝐫𝐞‌𝐝𝐢𝐭𝐨𝐬 : $credits\n[↯] 𝐀𝐧𝐭𝐢𝐬𝐩𝐚𝐦 : $antispam\n[↯] 𝐄𝐱𝐩𝐢𝐫𝐞 : $expiry</b>", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
    $m1  = sendvideo($content);
}}



?>