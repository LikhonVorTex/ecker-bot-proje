<?php

if (strpos($text, '$key') === 0){
if($user_id == "1346261438" or $user_id == "1097564715" or $user_id == "1436293638" or $user_id == "5173634228" or $user_id == "5470919796" or $user_id == "5147213203" or $user_id == "5520425224"){}
else{
    exit();
}



    $listak = substr($text, 5);
    $i     = explode("|", $listak);
    $plantype    = $i[0];
    $expiry  = $i[1];
    $expiry = $expiry * 86400;
    $now = time();
    $expiry = $now + $expiry;
    ///////////////////////[2nd Req is for VALIDATE]
    
    if(empty($plantype)){
$plantype = "P";
}
    
    function RandomString($length = 4)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    
    if ($plantype == "P") {
        $plantype = "Premium User";
    }
    
    if ($plantype == "V") {
        $plantype = "Vip User";
    }
    $two = RandomString();
    $three = RandomString();
    $four = RandomString();
    $key = 'MikazaChkBot-'.$two.''.$three.''.$four.'';
    // Check connection
    // Attempt create database query execution
    $SQL = "INSERT INTO nick (nick, status, plan, planexpiry) VALUES ('$key', 'ACTIVE','$plantype','$expiry')";
    $CONSULTA = mysqli_query(mysqlcon(),$SQL);
    if(mysqli_query(mysqlcon(), $SQL)){
        $result = "> 𝘜𝘴𝘦𝘳 𝘈𝘶𝘵𝘩𝘰𝘳𝘪𝘻𝘦𝘥 𝘚𝘶𝘤𝘤𝘦𝘴𝘴𝘧𝘶𝘭𝘭𝘺 🕊";
    } else{
        $result = mysqli_error(mysqlcon());
    }
    
    $expiry = date('l jS \of F Y h:i:s A',$expiry);
    //=========================================================[Responses]
    $file = fopen("test.txt","w");
    echo fwrite($file,$result);
    fclose($file);
    
    
    //////////Bot Respo
    

        $content = ['chat_id' => $chat_id, 'text' => "<b>𝗞𝗲𝘆 𝗠𝗶𝗸𝗮𝘇𝘇𝗮 𝗚𝗲𝗻𝗲𝗿𝗮𝗱𝗮! ♻️:  ---------------------------------------- 💥𝗞𝗲𝘆: <code>$key</code> ----------------------------------------\nPLAN EXPIRY: $expiry\nPLAN TYPE: $plantype \n ----------------------------------------\n 𝗨𝘀𝗮 𝗘𝗹 𝗖𝗼𝗺𝗮𝗻𝗱𝗼 /redeem
𝗣𝗮𝗿𝗮 𝗖𝗮𝗻𝗷𝗲𝗮𝗿𝗹𝗮 \n 𝗚𝗲𝗻 𝗯𝘆:  @$username----------------------------------------</b> 𝗗𝗶𝘀𝗳𝗿𝘂𝘁𝗮𝗹𝗮!!! 🎊", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
        $m1  = SendMessage($content);
    
    }