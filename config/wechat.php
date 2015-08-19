<?php
return [
    'use_alias'    => false,
    'app_id'       => env('WEIXIN_APP_ID', 'YourAppId'), // 必填
    'secret'       => env('WEIXIN_SECRET', 'YourSecret'), // 必填
    'token'        => env('WEIXIN_TOKEN', 'YourToken'),  // 必填
    'encoding_key' => env('WEIXIN_ENCODING_KEY', 'YourEncodingAESKey'), // 加密模式需要，其它模式不需要
    'domain'       => env('WEIXIN_DOMAIN', 'YourDomain'), // 必填
];