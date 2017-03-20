<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Role;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('tag', 64)->unique();
            $table->string('description');
            $table->timestamps();
        });
        $role = Role::create( [ 'name' => '未审核用户', 'tag' => 'guest', 'description' => '审核通过后升为注册用户' ] );
        $role = Role::create( [ 'name' => '注册用户', 'tag' => 'normal', 'description' => '常规用户，拥有部分权限' ] );
        $role = Role::create( [ 'name' => '管理员', 'tag' => 'admin', 'description' => '拥有大部分权限' ] );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
