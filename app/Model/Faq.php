<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
    protected $guarded = [];
    public $timestamps = false;
}
