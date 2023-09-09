<?php
if(strpos($text,'$credits')===0){

$listak = substr($text, 9);
    $i     = explode("|", $listak);
    $user    = $i[0];
    $credits  = $i[1];
    $sql = "SELECT creditos FROM administrar WHERE id='$user'";
    $result = mysqli_query(mysqlcon(), $sql);
    
    $json_array = [];
    
    
    while ($row = mysqli_fetch_assoc($result)) {
      $json_array[] = $row;
    }
    
    $final2 = json_encode($json_array);
    
    
    $file = fopen("test.txt","w");
    echo fwrite($file,$message_id);
    fclose($file);
    
    $creditss = anicap($final2, '"credits":"','"');
    mysqli_close(mysqlcon());
    $credits = $creditss + $credits;
if(!empty($user)){
$SQL = "UPDATE `administrar` SET `credits`='$credits' WHERE `id` = '$user'";

mysqli_query(mysqlcon(), $SQL);
$content = ['chat_id' => $chat_id, 'text' => "credits updated to $user whare credits = $credits ", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
SendMessage($content);
exit();
}}