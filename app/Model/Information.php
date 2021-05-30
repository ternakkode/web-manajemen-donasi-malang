<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{

    protected $table = 'informations';
    protected $guarded = [];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function category() {
        return $this->belongsTo('App\Model\InformationCategory', 'information_category_id');
    }
    
    public function campaigns() {
        return $this->hasMany('App\Model\Campaign');
    }
}
