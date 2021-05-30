<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';
    protected $guarded = [];
    public $timestamps = false;

    public function users() {
        return $this->hasMany('App\Model\User');
    }
}
