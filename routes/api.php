<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('solia/image', 'API\SoliaImageController@upload');
Route::patch('solia/{soliaId}/image/{photoId}', 'API\SoliaImageController@setPrimary');
Route::delete('solia/{soliaId}/image/{photoId}', 'API\SoliaImageController@delete');

Route::post('campaign/image', 'API\CampaignImageController@upload');
Route::patch('campaign/{campaignId}/image/{photoId}', 'API\CampaignImageController@setPrimary');
Route::delete('campaign/{soliaId}/image/{photoId}', 'API\CampaignImageController@delete');
