<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Models\User;
use App\Models\Role;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        if ($users == null) $users = [];

        $data = [
            'page_name' => '用户管理',
            'page_description' => '对用户进行增删改查等操作',
            'users' => $users,
            'roles' => $roles,
        ];
        return $this->parse('management.user', $data, 'mgmt_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respData = [];
        $statusCode = 200;

        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'password' => bcrypt($request->input('password')),
        ];

        // try
        // {
        //     
        // }
        $user = User::create($userData);
        if ($user->id > 0)
        {
            $respData['code'] = 0;
            $respData['message'] = '创建成功';
            $respData['new_user_id'] = $user->id;
        }
        else
        {
            $respData['code'] = 1;
            $respData['message'] = '创建失败';
            $statusCode = 500;
        }
        return response()->json($respData, $statusCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statusCode = 200;
        $users = null;
        if ($id == 'all')
        {
            $users = User::all();
            if ($users->count() == 0)
            {
                $statusCode = 404;
            }
        }
        else
        {
            $users = [];
            $user = User::find($id);
            if ($user == null)
            {
                $statusCode = 404;
            }
            else
            {
                $users[] = $user;
            }
        }
        return response()->json($users, $statusCode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
