<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use Auth;
use App\Models\Role;
use App\Common\TableColumn;

class RoleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            new TableColumn('角色编号', 'id'),
            new TableColumn('名称', 'name'),
            new TableColumn('标识', 'tag'),
            new TableColumn('人数', 'element_count'),
        ];

        $data = [
            'page_name' => '角色管理',
            'page_description' => '对角色进行增删改查等操作',
            'object_name' => '角色',
            'resource_url' => url('management/role'),
            'columns' => $columns,
        ];
        return $this->parse('management.role', $data, 'mgmt_role');
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

        $roleData = [
            'name' => $request->input('name'),
            'tag' => $request->input('tag'),
            'description' => $request->input('description'),
        ];

        $role = Role::create($roleData);
        if ($role->id > 0)
        {
            $respData['code'] = 0;
            $respData['message'] = '创建成功';
            $respData['new_record_id'] = $role->id;
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
        $roles = null;

        if ($id == 'all')
        {
            $roles = Role::all();
            if ($roles->count() == 0)
            {
                $statusCode = 404;
            }
            foreach ($roles as $role)
            {
                $role->element_count = $role->elements()->count();
            }
        }
        else
        {
            $role = Role::find($id);
            if ($role == null)
            {
                $statusCode = 404;
            }
            else
            {
                $role->element_count = $role->elements()->count();
                $roles = [ $role ];
            }
        }

        return response()->json($roles, $statusCode);
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
        $errorCode = 0;
        $statusCode = 200;
        $message = '';

        // 不能删除tag为guest、admin的这两个内部角色
        $role = Role::find($id);
        do
        {
            if ($role == null)
            {
                break;
            }
            if ($role->tag == 'guest' || $role->tag == 'admin')
            {
                $errorCode = 1;
                $message = '不能删除内置角色';
                break;
            }

            $role->delete();
            $message = '删除角色成功';
        }
        while (false);
        
        $respData = [
            'code' => $errorCode,
            'message' => $message
        ];
        return response()->json($respData, $statusCode);
    }
}
