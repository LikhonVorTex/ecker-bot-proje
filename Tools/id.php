<?php
if((strpos($message, '/id') === 0) or ((strpos($message, '!id') === 0)) or ((strpos($message, '.id') === 0) or (strpos($message, '#id') === 0)) or (strpos($message, '?id') === 0)){
$starttime = microtime(true);
$mytime = 'time1';
sendMessage($chatId, "<b>User ID:<code> $userId </code> | Took:<code> {$mytime($starttime)}s</code>
Chat ID: <code>$chatId</code></b>",$message_id);
}
?>