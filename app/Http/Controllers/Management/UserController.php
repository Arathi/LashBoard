<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use Auth;
use App\Models\User;
use App\Models\Role;
use App\Common\TableColumn;

/**
 * 用户控制器
 * 
 * @Route(mode="resource", pattern="/management/user", name="user")
 */
class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $guest = Role::where('tag', 'guest')->first();
        $guest_role_id = $guest->id;

        $columns = [
            new TableColumn('UID', 'id'),
            new TableColumn('头像', 'avatar'),
            new TableColumn('邮箱', 'email'),
            new TableColumn('用户名', 'name'),
            new TableColumn('角色', 'role_name'),
            new TableColumn('创建时间', 'created_at'),
            new TableColumn('最后活跃', 'updated_at'),
        ];

        $data = [
            'page_name' => '用户管理',
            'page_description' => '对用户进行增删改查等操作',
            'object_name' => '用户',
            'resource_url' => url('management/user'),
            'roles' => $roles,
            'columns' => $columns,
            'default_role_id' => $guest_role_id,
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

        $user = User::create($userData);
        if ($user->id > 0)
        {
            $respData['code'] = 0;
            $respData['message'] = '创建成功';
            $respData['new_record_id'] = $user->id;
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
            foreach ($users as $user)
            {
                $user->role_name = $user->role->name;
            }
        }
        else
        {
            $user = User::find($id);
            if ($user == null)
            {
                $statusCode = 404;
            }
            else
            {
                $user->role_name = $user->role->name;
                $users = [ $user ];
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
        $statusCode = 200;
        $code = 0;
        $message = '更新成功！';
        $user = User::find($id);
        do
        {
            if ($user == null)
            {
                $statusCode = 404;
                $code = 1;
                $message = '该用户不存在！';
                break;
            }

            $name = $request->input('name', null);
            $role_id = $request->input('role_id', null);
            // $email = $request->input('email', null);
            $password = $request->input('password', null);

            if ($name != null) $user->name = $name;
            if ($role_id != null) $user->role_id = $role_id;
            // if ($email != null) $user->email = $email;
            if ($password != null) $user->password = bcrypt($password);

            $user->save();
        }
        while (false);
        $respData = [
            'code' => $code,
            'message' => $message,
        ];
        return response()->json($respData, $statusCode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $errorCode = 0;
        $statusCode = 200;
        $message = '';
        // 不能删除自己
        $currentUserId = Auth::id();
        do
        {
            if ($currentUserId == $id)
            {
                $errorCode = 1;
                $statusCode = 403;
                $message = "不能删除自己的账户！";
                break;
            }

            $user = User::find($id);
            if ($user == null)
            {
                $errorCode = 2;
                $statusCode = 404;
                $message = "要删除的账号并不存在！";
                break;
            }

            // TODO 无法删除上级用户

            // 执行删除用户
            $user->delete();
        }
        while (false);

        $respData = [
            'code' => $errorCode,
            'message' => $message
        ];
        return response()->json($respData, $statusCode);
    }
}
