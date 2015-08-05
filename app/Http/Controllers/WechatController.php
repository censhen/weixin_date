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

use Log, Request;
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
                        Message::make('news_item')->title('男生列表')->description('查看所有男生列表')->url('http://123.56.106.172/users?gender=1'),
                    );
                });
                return $news;
            } elseif($event['EventKey'] == self::EVENT_SHOW_GIRLS) {
                $news = Message::make('news')->items(function(){
                    return array(
                        Message::make('news_item')->title('女生列表')->description('查看所有女生列表')->url('http://123.56.106.172/users?gender=2'),
                    );
                });
                return $news;
            } elseif($event['EventKey'] == self::EVENT_RELATION_AD) {
                return Message::make('text')->content('情感顾问功能正在制作中，敬请期待！');
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
                "key"=>"http://123.56.106.172/apply",
            ],
            [
                "name" => "查看会员",
                "type" => null,
                "key" => null,
                "buttons" => [
                    [
                        "name"=>"我要男生",
                        "type"=>"view",
                        "key"=>"http://123.56.106.172/users?gender=1",
//                        "key"=>"SHOW_BOYS",
                    ],
                    [
                        "name"=>"我要女生",
                        "type"=>"view",
                        "key"=>"http://123.56.106.172/users?gender=2",
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