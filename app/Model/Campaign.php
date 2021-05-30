<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{

    protected $table = 'campaigns';
    protected $guarded = [];
    public $timestamps = false;

    public function donations() {
        return $this->hasMany('App\Model\Donation');
    }

    public function solia() {
        return $this->hasMany('App\Model\Solia');
    }

    public function photos() {
        return $this->hasMany('App\Model\CampaignPhoto');
    }

    public function campaignType() {
        return $this->belongsTo('App\Model\CampaignType');
    }

    public function outcomes() {
        return $this->hasMany('App\Model\Outcome');
    }

    public function information() {
        return $this->belongsTo('App\Model\Information');
    }
}
