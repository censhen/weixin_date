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
            return $_GET["echostr"];
    }

    public function setMenu(Menu $menu)
    {
        $raw_menu = [
            [
                "name"=>"我要加入",
                "type"=>"view",
                "key"=>"http://123.56.106.172/apply",
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

        $menu->set($target);

        return "自定义菜单成功";
    }
}