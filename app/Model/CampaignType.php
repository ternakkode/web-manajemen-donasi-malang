<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CampaignType extends Model
{

    protected $table = 'campaign_types';
    protected $guarded = [];
    public $timestamps = false;

    public function campaigns() {
        return $this->hasMany('App\Model\Campaign');
    }
}
