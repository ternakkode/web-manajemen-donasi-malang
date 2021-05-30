<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InformationCategory extends Model
{

    protected $table = 'information_categories';
    protected $guarded = [];
    public $timestamps = false;

    public function informations() {
        return $this->hasMany('App\Model\Information');
    }
}
