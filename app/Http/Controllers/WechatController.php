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
    public function serve(Server $server)
    {
        $server->on('event','click', function($event) {

            error_log('收到关注事件，关注者openid: ' . $event['FromUserName']);
            Log::info('recieve event');
            return Message::make('text')->content('感谢您关注');
        });
//        $res = $server->serve();
//        return $res;
//        return $_GET["echostr"];
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
                "name"=>"我要查看",
                "type"=>"click",
                "key"=>"SHOW_USER",
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

    public function getShowUser(Server $server)
    {
        $news = Message::make('news')->items(function(){
            return array(
                Message::make('news_item')->title('测试标题'),
                Message::make('news_item')->title('测试标题2')->description('好不好？'),
                Message::make('news_item')->title('测试标题3')->description('好不好说句话？')->url('http://baidu.com'),
                Message::make('news_item')->title('测试标题4')->url('http://baidu.com/abc.php')->picUrl('http://www.baidu.com/demo.jpg'),
            );
        });

        return $server->serve();
    }

}