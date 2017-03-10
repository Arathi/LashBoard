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
        return config('menu.default-menu', []);
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
