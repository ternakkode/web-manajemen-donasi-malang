<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{

    protected $table = 'outcomes';
    protected $guarded = [];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function campaign() {
        return $this->belongsTo('App\Model\Campaign');
    }
}
