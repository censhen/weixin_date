<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: cshen
 * Date: 15-7-27
 * Time: 下午2:56
 */
use Overtrue\Wechat\Server;
use Log;
use Overtrue\Wechat\AccessToken;

class WechatController extends Controller {

    /**
     * 处理微信的请求消息
     *
     * @param Overtrue\Wechat\Server $server
     *
     * @return string
     */
    public function serve(Server $server, AccessToken $accessToken)
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = $accessToken->getToken();
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return $_GET["echostr"];
        }else{
            return false;
        }
    }
}