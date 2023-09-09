<?php

require_once 'requires.php';
require_once '/home/alvcarr230/www/project/data/data.php';


/* This is the code that is executed when the user sends the command `/start` or `.start` or `?start` or `#start` or `/start@` to the bot. */
if ($text == '/start' || $text == ".start" || $text == "?start" || $text == "#start" || $text == "/start@XtraChkbot") {
$keyboard = json_encode([
        "inline_keyboard" => [
            [
                ["text" => "Offical Group", "url" => "https://t.me/Mikazachat"]
            ]
        ]
    ]);
    $content = ['chat_id' => $chat_id,'video'=> 'mikazausers.alwaysdata.net/project/start.mp4','caption' => "<b>𝗛𝗲𝗹𝗹𝗼 𝗺𝘆 𝗻𝗮𝗺𝗲 𝗶𝘀 𝗠𝗶𝗸𝗮𝘇𝗮 🌺\n𝗔 𝗯𝗼𝘁 𝗽𝗿𝗼𝗴𝗿𝗮𝗺𝗺𝗲𝗱 𝘁𝗼 𝗰𝗵𝗲𝗰𝗸 𝘆𝗼𝘂𝗿 𝗰𝗮𝗿𝗱𝘀. 🍃\n𝗖𝘂𝗿𝗿𝗲𝗻𝘁𝗹𝘆 𝗜 𝗵𝗮𝘃𝗲 𝗫 𝗴𝗮𝘁𝗲𝘀 𝗮𝘂𝘁𝗵 𝗮𝗻𝗱 𝗫 𝗴𝗮𝘁𝗲𝘀 𝗰𝗵𝗮𝗿𝗴𝗲𝗱, 𝗮𝘀 𝘄𝗲𝗹𝗹 𝗮𝘀 𝗫 𝗧𝗼𝗼𝗹𝘀. 🌷\n𝗧𝗼 𝗼𝗯𝘁𝗮𝗶𝗻 𝗮𝘂𝘁𝗵𝗼𝗿𝗶𝘇𝗮𝘁𝗶𝗼𝗻 𝗰𝗼𝗻𝘁𝗮𝗰𝘁 𝗮𝗻 𝗮𝗱𝗺𝗶𝗻 @Ceshack7 and @Gabrielgodzzz 🌸</b>", 'reply_to_message_id' => $msg_id,  'reply_markup' => $keyboard,'parse_mode' => 'HTML'];
    $m3 = sendvideo($content);

}


/* This is the code that is executed when the user sends the command `/cmds` or `.cmds` or `?cmds` or `#cmds` or `/cmds@` to the bot. */
if ($text == '/cmds' || $text == ".cmds" || $text == "?cmds" || $text == "#cmds" || $text == "/cmds@XtraChkbot") {
$sql = "SELECT * FROM `authorize` WHERE chats=".$chat_id;
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $chats = $raw['chats'];

    if($chats != $chat_id and $ctype == "supergroup"){
        $content = ['chat_id' => $chat_id, 'text' => "$group_not_allowed", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
        $m1  = SendMessage($content);
        exit();
    }
    else{
        
       
    }
        
    $sql = "SELECT * FROM administrar WHERE id='$user_id'";
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $plan = $raw['plan'];
     mysqli_close(mysqlcon());
    
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
    $SQL = "SELECT * FROM `administrar` WHERE `id`=".$user_id;
    $CONSULTA = mysqli_query(mysqlcon(),$SQL);
    $f = mysqli_num_rows($CONSULTA);

    if($f > 0)
    {} else{
        $content = ['chat_id' => $chat_id, 'text' => "$not_registered", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
        $m1  = SendMessage($content);
        exit;
    }
    $keyboard = json_encode([
        "inline_keyboard" => [
            [
                ["text" => "Gateways", "callback_data" => "gates"],
                ["text" => "Tools 🔧", "callback_data" => "tools"],
                ["text" => "About Me", "callback_data" => "info"]
            ],
            [
                ["text" => "Close", "callback_data" => "exit"]
            ],
            [
                ["text" => "SUPPORT CHAT", "url" => "https://t.me/Mikazachat"]
            ]
        ]
    ]);

    $content = ['chat_id' => $chat_id,'video'=> 'mikazausers.alwaysdata.net/project/cmdss.gif.mp4','caption' => "𝗛𝗲𝗿𝗲 𝗶𝘀 𝗺𝘆 𝗰𝗼𝗺𝗺𝗮𝗻𝗱𝘀💥", 'reply_markup' => $keyboard, 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
    $m1 = sendvideo($content);
}


/* This is the code that is executed when the user clicks on the "Return" button. */
if ($data == "home" || $data == "return") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
        $keyboard = json_encode([
            "inline_keyboard" => [
            [
                ["text" => "Gateways", "callback_data" => "gates"],
                ["text" => "Tools 🔧", "callback_data" => "tools"],
                ["text" => "About Me", "callback_data" => "info"]
            ],
            [
                ["text" => "Close", "callback_data" => "exit"]
            ],
            [
                ["text" => "SUPPORT CHAT", "url" => "https://t.me/Mikazachat"]
            ]
        ]
        ]);


$content = ['chat_id' => $callbackchatid,'video'=> 'mikazausers.alwaysdata.net/project/start.mp4','caption' => "𝗛𝗲𝗿𝗲 𝗶𝘀 𝗺𝘆 𝗰𝗼𝗺𝗺𝗮𝗻𝗱𝘀💥", 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditCaption($content);
    }
}


/* This is the code that is executed when the user clicks on the "Gates" button. */
if ($data == "gates") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    ["text" => "Charge", "callback_data" => "charge"],
                    ["text" => "Auth", "callback_data" => "auth"],
                    ["text" => "Custom", "callback_data" => "custom"],
                ],
                [
                    ["text" => "Previous", "callback_data" => "home"],
                   // ["text" => "Close", "callback_data" => "end"]
                ]
            ]
        ]);

        $content = ['chat_id' => $callbackchatid,'photo'=> 'xtrachkbot.alwaysdata.net/project/th.jpeg','caption' => "𝐆𝐀𝐓𝐄𝐖𝐀𝐘𝐒", 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditCaption($content);
    }
}

/* This is the code that is executed when the user clicks on the "Gates Charge" button. */
if ($data == "charge") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    ["text" => "Previous", "callback_data" => "gates"],
                  //  ["text" => "Next", "callback_data" => "charge2"],
                ]
            ]
        ]);

        /*$content = ['chat_id' => $callbackchatid, 'text' => $charge, 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditMessageText($content);*/
        $content = ['chat_id' => $callbackchatid,'photo'=> 'xtrachkbot.alwaysdata.net/project/th.jpeg','caption' => $charge, 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditCaption($content);
    }
}

/* This is the code that is executed when the user clicks on the "Gates Auth" button. */
if ($data == "auth") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    ["text" => "Previous", "callback_data" => "gates"],
         //           ["text" => "Home", "callback_data" => "home"],
                ]
            ]
        ]);


$content = ['chat_id' => $callbackchatid,'photo'=> 'xtrachkbot.alwaysdata.net/project/th.jpeg','caption' => $auth, 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditCaption($content);
    }
}


if ($data == "custom") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    ["text" => "Previous", "callback_data" => "gates"],
                  //  ["text" => "", "callback_data" => "auth"],
                  //  ["text" => "Home", "callback_data" => "return"],
                ]
            ]
        ]);

        
$content = ['chat_id' => $callbackchatid,'photo'=> 'xtrachkbot.alwaysdata.net/project/th.jpeg','caption' => $custom, 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditCaption($content);
    }
}


/* This is the code that is executed when the user clicks on the "3D Check" button. */
if ($data == "3d") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    ["text" => "Gates Auth", "callback_data" => "auth"],
                    ["text" => "Gates Charge", "callback_data" => "charge"],
                    ["text" => "Return", "callback_data" => "return"],
                ]
            ]
        ]);

        /*$content = [
            'chat_id' => $callbackchatid,
            'text' => $gates3d,
            'message_id' => $callbackmessageid,
            'reply_markup' => $keyboard,
            'parse_mode' => 'HTML'
        ];*/
$content = ['chat_id' => $callbackchatid,'photo'=> 'xtrachkbot.alwaysdata.net/project/th.jpeg','caption' => $gates3d, 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditCaption($content);
        
    }
}


/* This is the code that is executed when the user clicks on the "Tools" button. */
if ($data == "tools") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    ["text" => "Return", "callback_data" => "return"]
                ]
            ]
        ]);

        /*$content = [
            'chat_id' => $callbackchatid,
            'text' => ,
            'message_id' => $callbackmessageid,
            'reply_markup' => $keyboard,
            'parse_mode' => 'HTML'
        ];
        EditMessageText($content);*/
$content = ['chat_id' => $callbackchatid,'photo'=> 'xtrachkbot.alwaysdata.net/project/th.jpeg','caption' => $herramientas, 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditCaption($content);
    }
}


/* The code that is executed when the user clicks on the "Info" button. */
if ($data == "info") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    ["text" => "Return", "callback_data" => "return"]
                ]
            ]
        ]);

       /* $content = [
            'chat_id' => $callbackchatid,
            'text' => $informacion,
            'message_id' => $callbackmessageid,
            'reply_markup' => $keyboard,
            'parse_mode' => 'HTML'
        ];
        EditMessageText($content);*/
$content = ['chat_id' => $callbackchatid,'photo'=> 'xtrachkbot.alwaysdata.net/project/th.jpeg','caption' => $informacion, 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard, 'parse_mode' => 'HTML'];
        EditCaption($content);
    }
}

/* This is the code that is executed when the user clicks on the "Finalize" button. */
if ($data == "exit") {
    if ($callbackfrom != $callbackuserid) {
        $content = ['callback_query_id' => $callbackid, 'text' => "Access denied opens another session to use it ❌", "show_alert" => true];
        answerCallbackQuery($content);
    } else {
       /* $content = [
            'chat_id' => $callbackchatid,
            'text' => "𝑮𝒐𝒐𝒅𝒃𝒚𝒆! <a href='t.me/$callbackusername'>$callbackfname</a>.",
            'message_id' => $callbackmessageid,
            'reply_markup' => $keyboard,
            'disable_web_page_preview' => true,
            'parse_mode' => 'HTML'
        ];*/
        $content = ['chat_id' => $callbackchatid,'photo'=> 'xtrachkbot.alwaysdata.net/project/th.jpeg','caption' => "Session ended! <a href='t.me/$callbackusername'>$callbackfname</a>.", 'message_id' => $callbackmessageid, 'reply_markup' => $keyboard,'disable_web_page_preview' => true, 'parse_mode' => 'HTML'];
        EditCaption($content);
    }
}