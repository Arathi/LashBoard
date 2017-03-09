<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends AdminController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'page_name' => '首页',
            'page_description' => '首页说明',
        ];
        return $this->parse('layouts.dashboard', $data);
    }
}
