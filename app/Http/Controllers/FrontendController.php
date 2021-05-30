<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view('page/frontend/index');
    }

    public function information() {
        return view('page/frontend/information');
    }

    public function informationDetail($id) {
        return view('page/frontend/information_detail');
    }

    public function faq() {
        return view('page/frontend/faq');
    }

    public function solia() {
        return view('page/frontend/solia');
    }

    public function soliaDetail($id) {
        return view('page/frontend/solia_detail');
    }

    public function campaign() {
        return view('page/frontend/campaign');
    }

    public function campaignDetail($id) {
        return view('page/frontend/campaign_detail');
    }

    public function donation() {
        return view('page/frontend/donation');
    }

    public function transparation() {
        return view('page/frontend/transparation');
    }
}
