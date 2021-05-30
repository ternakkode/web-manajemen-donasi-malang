<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CampaignPhoto extends Model
{

    protected $table = 'campaign_photos';
    protected $guarded = [];
    public $timestamps = false;

    public function campaign() {
        return $this->belongsTo('App\Model\Campaign');
    }
}
