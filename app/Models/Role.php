<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'tag', 'description',
    ];

    public function elements()
    {
        return $this->hasMany('App\Models\User', 'role_id', 'id');
    }
}
