<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SoliaPhoto extends Model
{

    protected $table = 'solia_photos';
    protected $guarded = [];
    public $timestamps = false;

    public function solia() {
        return $this->belongsTo('App\Model\Solia');
    }
}
