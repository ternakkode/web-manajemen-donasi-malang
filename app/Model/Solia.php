<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Solia extends Model
{

    protected $table = 'solias';
    protected $guarded = [];
    public $timestamps = false;

    public function campaign() {
        return $this->belongsTo('App\Model\Campaign');
    }

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function photos() {
        return $this->hasMany('App\Model\SoliaPhoto');
    }
}
