<?php
//biz bilan qoling @foydali_api
ob_start();
error_reporting(0);
$token = '5241979808:AAFzPOuy-5k7McFYNvvj_39vZMKU5b8r3bg';
function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

//manba foydali_api
//admin shunchaki malumot olish sifatida tarqatib yubordi @admin


function  get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);   
    $ch_data = curl_exec($ch);
    curl_close($ch);
    return $ch_data;
}
function inlinebutton($keyboard) {
    return json_encode([
        'inline_keyboard'=>$keyboard
    ]);
}
//funksiya tugadi asalim
$add = inlinebutton([   
[["text"=>" ➕ Guruhga qo'shish","url"=>"https://t.me/$botim?startgroup=new"]],
]);

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id =$message->message_id;
$text = $message->text;
$kutish = file_get_contents('https://foydaliapi.uz/bot/Wait.php');


if($text=="/start"){
    bot('sendMessage',[      
'chat_id'=>$chat_id,   
'text'=>" Xush kelibsiz!\nUshbu bot orqali siz ijtimoiy tarmoqlardan video hamda rasm yuklab olishingiz mumkin 😵 Imkoniyatlar 👇 \n1. Instagram video yuklash 💫\n2 Tik Tok post yuklash ⚡️ \n3. You Tube audio yuklash  ☄ \n4. like video yuklash\nVa bularni hammasi bepul🥳\nTezda botga o‘tamiz va foydalanamiz☺️\n $reklama",
'reply_markup'=>$add,
]);    
}


//manba foydali_api
//admin shunchaki malumot olish sifatida tarqatib yubordi @admin


if(preg_match('/.*instagram\.com.*/i',$text)){
$url1 = "https://FoydaliApi.uz/yukla.php?url=$text";
$link =json_decode(file_get_contents($url1),true);
$y = $link['url'][1]['url'];
bot('sendMessage',[

 'chat_id'=>$chat_id ,

 'text'=>"$kutish",
 ]);
 sleep(0.10);
 bot('deletemessage',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id+1,
 ]);
 sleep(0.10);
 bot('sendChatAction', [
 'chat_id' => $chat_id,
 'action' => 'upload_video'
 ]);
 sleep(0.3);
$ok = bot('sendVideo', [
'chat_id'=>$chat_id,
'video'=>$y,

])->ok;
if($ok==true){
}else{
 $inink = json_decode(file_get_contents("https://foydaliapi.uz/yukla.php?url=$text"),true)['url'][0]['url'];
 bot('sendVideo', [
'chat_id'=>$chat_id,
'video'=>$inink,
]);
}
}
//manba foydali_api

//admin shunchaki malumot olish sifatida tarqatib yubordi @admin

if(preg_match('/.*twitter\.com.*/i',$text)){
$oklink = json_decode(file_get_contents("https://foydaliapi.uz/Universal.php?url=$text"),true)['url'][0]['url'];
bot('sendMessage',[

 'chat_id'=>$chat_id ,

 'text'=>"$kutish",
 ]);
 sleep(0.5);
 bot('deleteMessage',[
 'chat_id'=>$chat_id ,
 'message_id'=>$message_id+1,
 ]);
 sleep(0.4);
 bot('sendChatAction', [
 'chat_id' => $chat_id,
 'action' => 'upload_video'
 ]);
 sleep(0.3);
bot('sendVideo', [
'chat_id'=>$chat_id,
'video'=>$oklink,

]);}



//manba foydali_api
//admin shunchaki malumot olish sifatida tarqatib yubordi @admin

if(preg_match('/^(get)(.*?)/i',$text)){
$s= str_replace('get','',$text);
file_put_contents("$chat_id.html", get($s));
bot('sendDocument', [
        'chat_id' => $chat_id,
        "mime_type"=> "application/octet-stream",
       "document"=>new CURLFile("$chat_id.html"),
      "caption"=>"foydaliapi.uz",
        'parse_mode' => "Markdown",
        'disable_notification' => false,
    ]);
}

//manba foydali_api

//admin shunchaki malumot olish sifatida tarqatib yubordi @admin


if(preg_match('/.*likee\.video.*/i',$text)){
$oklink = json_decode(file_get_contents("http://foydaliapi.uz/like.php?url=$text"),true)[0]['url'];
bot('sendMessage',[

 'chat_id'=>$chat_id ,

 'text'=>"$kutish",
 ]);
 sleep(0.5);
 bot('deleteMessage',[
 'chat_id'=>$chat_id ,
 'message_id'=>$message_id+1,
 ]);
 sleep(0.4);
 bot('sendChatAction', [
 'chat_id' => $chat_id,
 'action' => 'upload_video'
 ]);
 sleep(0.3);
bot('sendVideo', [
'chat_id'=>$chat_id,
'video'=>$oklink,
]);}

//manba foydali_api

//admin shunchaki malumot olish sifatida tarqatib yubordi @admin

if(preg_match('/.*.tiktok\.com.*/i',$text)){
$link = json_decode(file_get_contents("https://foydaliapi.uz/Universal.php?url=$text"),true)['url'][0]['url'];

bot('sendVideo', [
'chat_id'=>$chat_id,
'video'=>$link,

]);}

//manba foydali_api

//admin shunchaki malumot olish sifatida tarqatib yubordi @admin


if(preg_match('/.*.facebook\.com.*/i',$text)){
$noklink = json_decode(file_get_contents("https://foydaliapi.uz/Universal.php?url=$text"),true)['url'][0]['url'];
bot('sendMessage',[

 'chat_id'=>$chat_id ,

 'text'=>"$kutish",
 ]);
 sleep(0.5);
 bot('deleteMessage',[
 'chat_id'=>$chat_id ,
 'message_id'=>$message_id+1,
 ]);
 sleep(0.4);
 bot('sendChatAction', [
 'chat_id' => $chat_id,
 'action' => 'upload_video'
 ]);
 sleep(0.3);
$ok=bot('sendVideo', [
'chat_id'=>$chat_id,
'video'=>$noklink,

])->ok;
if($ok==true){
}else{
  $noklink = json_decode(file_get_contents("https://foydaliapi.uz/Universal.php?url=$text"),true)['url'][0]['url'];
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'Video hajmi juda katta  ! ' ,
 'reply_markup'=>inlinebutton([   

[["text"=>"🎥Yuklab olish","url"=>"$noklink"]],
]),
  ]);
}
}
//manba foydali_api

//admin shunchaki malumot olish sifatida tarqatib yubordi @admin

//Youtube
 if ((mb_stripos($text,"http://www.youtube.com/")!==false) or (mb_stripos($text,"https://youtube.com/")!==false)
or (mb_stripos($text,"https://youtu.be/")!==false)){
$yolink = json_decode(file_get_contents("https://FoydaliApi.uz/yukla.php?url=$text"),true)['url'][0]['url'];
bot('sendMessage',[

 'chat_id'=>$chat_id ,

 'text'=>"$kutish",
 ]);
 sleep(0.5);
 bot('deleteMessage',[
 'chat_id'=>$chat_id ,
 'message_id'=>$message_id+1,
 ]);
 sleep(0.4);
 bot('sendChatAction', [
 'chat_id' => $chat_id,
 'action' => 'upload_video'
 ]);
 sleep(0.3);
$ok=bot('sendVideo', [
'chat_id'=>$chat_id,
'video'=>$yolink,

])->ok;
if($ok==true){
}else{
  $yolink = json_decode(file_get_contents("https://foydaliapi.uz/Universal.php?url=$text"),true)['url'][0]['url'];
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'Video hajmi juda katta  ! ' ,
 'reply_markup'=>inlinebutton([   

[["text"=>"🎥Yuklab olish","url"=>"$yolink"]],
]),
  ]);
}
}



//manba foydali_api

//admin shunchaki malumot olish sifatida tarqatib yubordi @admin
//bilaman manbani olib kodni men yozganman deysizlar lekin api linklar borku
