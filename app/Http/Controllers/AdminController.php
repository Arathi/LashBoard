<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function parse($view, $data)
    {
        $addition = array();

        $addition['menu_tree'] = $this->get_menu_tree();

        if (config('feature.message', false))
            $addition['messages'] = $this->get_messages();

        if (config('feature.notification', false))
            $addition['notifications'] = $this->get_notifications();

        if (config('feature.task', false))
            $addition['tasks'] = $this->get_tasks();

        return view($view, $data, $addition);
    }

    protected function get_menu_tree()
    {
        $menuConfigMode = config('menu.config_mode', 'json');
        $menuTree = array();

        if ($menuConfigMode == 'json')
        {
            $menuJsonPath = resource_path('assets/menus.json');  // TODO 暂时写死
            $jsonContents = file_get_contents($menuJsonPath);
            $menusJson = json_decode($jsonContents);
            foreach ($menusJson as $menuJson)
            {
                // TODO 合并菜单项样式（header、listview、active等）
                // TODO 检查当前页面是否需要设置为active样式
                $menu_item_style = '';
                $styles = $menuJson->styles;
                foreach ($styles as $style)
                {
                    $menu_item_style .= $style . ' ';
                }
                $menu_item_style = trim($menu_item_style);

                // 生成URL（根据target_type和target生成）
                // target_type 有 url, route
                $target = $menuJson->target;
                $url = '#';
                if ($menuJson->target_type == 'url')
                {
                    if ( strncmp('https://', $target, 7) == 0 || 
                            strncmp('http://', $target, 6) == 0 || 
                            strncmp('//', $target, 2) == 0) 
                    {
                        // url为"http://"、"https://"、"//" 开头时，为绝对地址
                        $url = $target;
                    }
                    else
                    {
                        // 其他情况下使用url生成站内地址
                        $url = url( $target );
                    }
                }
                else if ($menuJson->target_type == 'route')
                {
                    // 如果使用route模式，请在route中命名路由，否则会报错
                    $url = route( $target );
                }

                $caption = $menuJson->caption;

                // TODO 根据$menuJson['icon']的值自动拼接
                $icon_style = $menuJson->icon;

                $menuTree[] = [
                    'style' => $menu_item_style,
                    'url' => $url,
                    'caption' => $caption,
                    'icon' => $icon_style
                ];
            }
        }
        else if ($menuTree == 'db')
        {
            //
        }

        return $menuTree;
    }

    protected function get_messages()
    {
        // post_time
        // sender_name
        // sender_avatar
        // content
        // url
        return [];
    }

    protected function get_notifications()
    {
        // icon
        // content
        return [];
    }

    protected function get_tasks()
    {
        // name
        // completion_rate
        return [];
    }
}
