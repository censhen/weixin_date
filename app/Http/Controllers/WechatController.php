<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: cshen
 * Date: 15-7-27
 * Time: 下午2:56
 */
use Overtrue\Wechat\Menu;
use Overtrue\Wechat\MenuItem;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;

use Log, Request, Config;
use Overtrue\Wechat\AccessToken;

class WechatController extends Controller {
    const EVENT_SHOW_BOYS = 'SHOW_BOYS';
    const EVENT_SHOW_GIRLS = 'SHOW_GIRLS';
    const EVENT_RELATION_AD = 'RELATION_ADVISOR';
    const EVENT_ACTIVITY_INFO = 'ACTIVITY_INFO';


    /**
     * 处理微信的请求消息
     *
     * @param Overtrue\Wechat\Server $server
     *
     * @return string
     */
    public function serve(Server $server)
    {
        // 欢迎订阅
        $server->on('event', 'subscribe', function($event) {
            Log::info('subscribe: ' . $event['FromUserName']);
            return Message::make('text')->content('感谢您关注晓瑾红娘公众号！');
        });

        // 自定义菜单事件
        $server->on('event', 'click', function($event) {
            Log::info('event: ' . $event['FromUserName']);
            if($event['EventKey'] == self::EVENT_SHOW_BOYS) {

                $news = Message::make('news')->items(function(){
                    return array(
                        Message::make('news_item')->title('男生列表')->description('查看所有男生列表')->url(Config::get('wechat.domain').'/users?gender=1'),
                    );
                });
                return $news;
            } elseif($event['EventKey'] == self::EVENT_SHOW_GIRLS) {
                $news = Message::make('news')->items(function(){
                    return array(
                        Message::make('news_item')->title('女生列表')->description('查看所有女生列表')->url(Config::get('wechat.domain').'/users?gender=2'),
                    );
                });
                return $news;
            } elseif($event['EventKey'] == self::EVENT_RELATION_AD) {
                return Message::make('text')->content('也许疲惫工作了一天的你，怎么都不明白，为什么就没有那么一个肩膀来供你依靠；
                也许努力经营着自己的你，总会有些牢骚，为什么就没有那么一双眼睛能将你欣赏；
                也许细心寻觅过姻缘的你，偶尔也会遐想，为什么就没有那么一方臂弯来把你拥抱？
                我们所求的其实不多，只是有些过错、有些错过，让原本的命中注定，变得若即若离，渴望而不可求。
                若您有话想说，无须犹豫，欢迎随时诉说情感路上的喜悦哀愁。
                美瑾红娘，只为你，执子之手、相濡以沫！！！');
            } elseif($event['EventKey'] == self::EVENT_ACTIVITY_INFO) {
                return Message::make('text')->content('活动介绍功能正在制作中，敬请期待！');
            }
        });

        $res = $server->serve();
        return $res;
    }

    public function setMenu(Menu $wechat_menu)
    {
        $raw_menu = [
            [
                "name"=>"我要加入",
                "type"=>"view",
                "key"=>Config::get('wechat.domain')."/apply",
            ],
            [
                "name" => "查看会员",
                "type" => null,
                "key" => null,
                "buttons" => [
                    [
                        "name"=>"我要男生",
                        "type"=>"view",
                        "key"=>Config::get('wechat.domain')."/users?gender=1",
//                        "key"=>"SHOW_BOYS",
                    ],
                    [
                        "name"=>"我要女生",
                        "type"=>"view",
                        "key"=>Config::get('wechat.domain')."/users?gender=2",
//                        "key"=>"SHOW_GIRLS",
                    ],
                ]
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

        // 构建你的菜单
        foreach ($raw_menu as $menu) {
            // 创建一个菜单项
            $item = new MenuItem($menu['name'], $menu['type'], $menu['key']);

            // 子菜单
            if (!empty($menu['buttons'])) {
                $buttons = [];
                foreach ($menu['buttons'] as $button) {
                    $buttons[] = new MenuItem($button['name'], $button['type'], $button['key']);
                }

                $item->buttons($buttons);
            }

            $target[] = $item;
        }

        $wechat_menu->set($target);

        return "自定义菜单成功";
    }
}