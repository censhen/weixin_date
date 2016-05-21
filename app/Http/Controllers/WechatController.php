<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: cshen
 * Date: 15-7-27
 * Time: 下午2:56
 */
use Log, Request, Config;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller {
    const EVENT_SHOW_BOYS = 'SHOW_BOYS';
    const EVENT_SHOW_GIRLS = 'SHOW_GIRLS';
    const EVENT_RELATION_AD = 'RELATION_ADVISOR';
    const EVENT_ACTIVITY_INFO = 'ACTIVITY_INFO';

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve(Application $wechat)
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat->server->setMessageHandler(function ($message) {
            switch ($message->MsgType) {
                case 'event':
                    # 事件消息..
                    switch ($message->Event) {
                        case 'subscribe':
                            return "欢迎关注，牵寻为您服务。";
                            break;
                        case 'click':
                            return 'click';
                            break;
                        default:
                            # code...
                            break;
                    }

                    break;
                case 'text':
                    return "zza";
                    break;
                case 'image':
                    # 图片消息...
                    break;
                case 'voice':
                    # 语音消息...
                    break;
                case 'video':
                    # 视频消息...
                    break;
                case 'location':
                    # 坐标消息...
                    break;
                case 'link':
                    # 链接消息...
                    break;
                // ... 其它消息
                default:
                    # code...
                    break;
            }

            // ...
        });

        Log::info('return response.');

        return $wechat->server->serve();
    }

    /**
     * 处理微信的请求消息
     *
     * @param Overtrue\Wechat\Server $server
     *
     * @return string
     */
//    public function serve(Server $server)
//    {
//        // 欢迎订阅
//        $server->on('event', 'subscribe', function($event) {
//            Log::info('subscribe: ' . $event['FromUserName']);
//            return Message::make('text')->content('感谢您关注晓瑾红娘公众号！');
//        });
//
//        // 自定义菜单事件
//        $server->on('event', 'click', function($event) {
//            Log::info('event: ' . $event['FromUserName']);
//            if($event['EventKey'] == self::EVENT_SHOW_BOYS) {
//
//                $news = Message::make('news')->items(function(){
//                    return array(
//                        Message::make('news_item')->title('男生列表')->description('查看所有男生列表')->url(Config::get('wechat.domain').'/users?gender=1'),
//                    );
//                });
//                return $news;
//            } elseif($event['EventKey'] == self::EVENT_SHOW_GIRLS) {
//                $news = Message::make('news')->items(function(){
//                    return array(
//                        Message::make('news_item')->title('女生列表')->description('查看所有女生列表')->url(Config::get('wechat.domain').'/users?gender=2'),
//                    );
//                });
//                return $news;
//            } elseif($event['EventKey'] == self::EVENT_RELATION_AD) {
//                return Message::make('text')->content('也许疲惫工作了一天的你，怎么都不明白，为什么就没有那么一个肩膀来供你依靠；
//                也许努力经营着自己的你，总会有些牢骚，为什么就没有那么一双眼睛能将你欣赏；
//                也许细心寻觅过姻缘的你，偶尔也会遐想，为什么就没有那么一方臂弯来把你拥抱？
//                我们所求的其实不多，只是有些过错、有些错过，让原本的命中注定，变得若即若离，渴望而不可求。
//                若您有话想说，无须犹豫，欢迎随时诉说情感路上的喜悦哀愁。
//                美瑾红娘，只为你，执子之手、相濡以沫！！！');
//            } elseif($event['EventKey'] == self::EVENT_ACTIVITY_INFO) {
//                return Message::make('text')->content('活动介绍功能正在制作中，敬请期待！');
//            }
//        });
//
//        $res = $server->serve();
//        return $res;
//    }

    public function setMenu(Application $wechat)
    {
        $raw_menu = [
            [
                "name"=>"我要加入",
                "type"=>"view",
                "key"=>Config::get('wechat.domain')."/apply",
            ],
            [
                "name"=>"匹配会员",
                "type"=>"view",
                "key"=>Config::get('wechat.domain')."/users",
            ],
            [
                "name" => "更多服务",
                "type" => null,
                "key" => null,
                "buttons" => [
                    [
                        "name"=>"情感顾问",
                        "type"=>"click",
                        "key"=>"RELATION_ADVISOR",
                    ],
                    [
                        "name"=>"活动介绍",
                        "type"=>"click",
                        "key"=>"ACTIVITY_INFO",
                    ],
                ]
            ],
        ];

        $wechat->menu->add($raw_menu);

        return "自定义菜单成功";
    }
}