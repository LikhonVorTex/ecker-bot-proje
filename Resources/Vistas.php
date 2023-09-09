<?php
require_once '/home/alvcarr230/www/project/Resources/inline.php';
/* It's a variable that contains a string. */
$auth = "
═════════════════
<b>[★] Syblus Auth</b>
═════════════════
<b>[★] Formato :</b> <code>/sb cc|mm|yy|cvv</code>
<b>[★] Estado : $sbstatus $sbtick</b>
<b>[★] Razones :</b> $sbcomment
";


/* It's a variable that contains a string. */
$custom = "
═════════════════
<b>[★] Custom SK Based</b>
═════════════════
<b>[★] Formato :</b> <code>/csk cc|mm|yy|cvv</code>
<b>[★] Estado : $cskstatus $csktick</b>
<b>[★] Razones :</b> $cskcomment";



/* It's a variable that contains a string. */
$charge = "
═════════════════
<b>[★] Shopify Charged</b>
═════════════════
<b>[★] Formato :</b> <code>/sh cc|mm|yy|cvv</code>
<b>[★] Estado : $shstatus $shtick</b>
<b>[★] Razones :</b> <code>$shcomment</code>
═════════════════
<b>[★] Paypal Charged</b>
═════════════════
<b>[★] Formato :</b> <code>/pp cc|mm|yy|cvv</code>
<b>[★] Estado : $ppstatus $pptick</b>
<b>[★] Razones :</b> <code>$ppcomment</code>
═════════════════
<b>[★] Stripe Charged</b>
═════════════════
<b>[★] Formato :</b> <code>/le cc|mm|yy|cvv</code>
<b>[★] Estado : ON ✅</b>
<b>[★] Razones :</b> <code>No comment added</code>
═════════════════";


/* It's a variable that contains a string. */
$gates3d = "<b>
┏━━━━━━━━━━━━━━
┣ 🍁 𝟑𝒅 𝑮𝒂𝒕𝒆𝒘𝒂𝒚𝒔 🍁
┗━━━━━━━━━━━━━━
══════════════════════
[★] 𝑩𝟑 𝑪𝒉𝒆𝒄𝒌 : <code>/bvb</code>
>_ Estado : OFF ❌
>_ Last Update : 10-10-2021
══════════════════════
</b>";


/* It's a variable that contains a string. */
$herramientas = "<b>
[🏔]  𝙏𝙤𝙤𝙡𝙨 𝙇𝙞𝙨𝙩 [🏔] 

------------------------------------------
[🏝] 𝗖𝗢𝗠𝗔𝗡𝗗𝗢: /gen
𝗙𝗼𝗿𝗺𝗮𝘁: 𝗰𝗰 | 𝗺| 𝘆 | 𝗰𝘃𝘃 
𝐒𝐭𝐚𝐭𝐮𝐬: ✅

[🏝]𝗖𝗢𝗠𝗔𝗡𝗗𝗢: /bin
𝗙𝗼𝗿𝗺𝗮𝘁: 𝗰𝗰 | 𝗺| 𝘆 | 𝗰𝘃𝘃 
𝐒𝐭𝐚𝐭𝐮𝐬: ✅

[🏝]𝗖𝗢𝗠𝗔𝗡𝗗𝗢: /rand
𝗙𝗼𝗿𝗺𝗮𝘁: US, CA, AU, ES, ETC
𝐒𝐭𝐚𝐭𝐮𝐬: ✅

[🏝]𝗖𝗢𝗠𝗔𝗡𝗗𝗢: /git
𝗙𝗼𝗿𝗺𝗮𝘁: git + name
𝐒𝐭𝐚𝐭𝐮𝐬: ✅

[🏝]𝗖𝗢𝗠𝗔𝗡𝗗𝗢: /ip
𝗙𝗼𝗿𝗺𝗮𝘁: ip Lookup
𝐒𝐭𝐚𝐭𝐮𝐬: ✅
</b>";

/* It's a variable that contains a string. */
$informacion = "<b>
┏━━━━━━━━━━━━━━
┣ ☁️ 𝙈𝙮 𝙞𝙣𝙛𝙤𝙧𝙢𝙖𝙩𝙞𝙤𝙣 ☁️
┗━━━━━━━━━━━━━━
══════════════════════
[♻️] 𝑳𝒂𝒏𝒈𝒖𝒂𝒈𝒆  : PHP 8.1
[♻️] 𝑴𝒖𝒍𝒕𝒊 𝑻𝒉𝒓𝒆𝒂𝒅𝒆𝒅  : No
[♻️] 𝑨𝒔𝒚𝒏𝒄𝒉𝒓𝒐𝒏𝒐𝒖𝒔  : Yes
[♻️] 𝑫𝒆𝒗𝒆𝒍𝒐𝒑𝒆𝒓  : @$propietario
══════════════════════
</b>";
