<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    
    protected $table = 'users';
    protected $guarded = [];
    public $timestamps = false;

    public function donations() {
        return $this->hasMany('App\Model\Donation');
    }

    public function role() {
        return $this->belongsTo('App\Model\Role');
    }

    public function solias() {
        return $this->hasMany('App\Model\Solia');
    }

    public function outcomes() {
        return $this->hasMany('App\Model\Outcome');
    }
}
