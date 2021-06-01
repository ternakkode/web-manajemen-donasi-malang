<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontendController@index');
Route::get('information', 'FrontendController@information');
Route::get('information/{id}', 'FrontendController@informationDetail');
Route::get('faq', 'FrontendController@faq');
Route::get('solia', 'FrontendController@solia');
Route::get('solia/{id}', 'FrontendController@soliaDetail');
Route::get('campaign', 'FrontendController@campaign');
Route::get('campaign/{id}', 'FrontendController@campaignDetail');
Route::get('donation', 'FrontendController@donation');
Route::post('donation', 'FrontendController@processDonation');
Route::get('transparation', 'FrontendController@transparation');

Route::group(['prefix' => 'auth', 'name' => 'auth.'], function () {
    Route::get('register', 'AuthController@registerView');
    Route::post('register', 'AuthController@registerProcess');
    Route::get('login', 'AuthController@loginView');
    Route::post('login', 'AuthController@loginProcess');
    Route::post('logout', 'AuthController@logoutProcess');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'name' => 'admin.', 'middleware' => 'auth'], function () {
// Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'name' => 'admin.'], function () {
    Route::get('/', 'DashboardController@index');

    Route::group(['prefix' => 'user-management', 'namespace' => 'UserManagement', 'name' => 'user-management.', 'middleware' => 'check.role:Superadmin'], function () {
    // Route::group(['prefix' => 'user-management', 'namespace' => 'UserManagement', 'name' => 'user-management.'], function () {
        Route::resource('user', 'UserController')->except('show');
        Route::resource('admin', 'AdminController')->except('show');
    });

    Route::group(['prefix' => 'financial', 'namespace' => 'Financial', 'name' => 'financial.', 'middleware' => 'check.role:Superadmin,Bendahara'], function () {
        Route::resource('donation', 'DonationController')->except('show');
        Route::patch('donation/{id}/approval', 'DonationController@approval');
        Route::resource('outcome', 'OutcomeController')->except('show');
    });

    Route::group(['prefix' => 'publication', 'namespace' => 'Publication', 'name' => 'publication.', 'middleware' => 'check.role:Superadmin,Publikasi'], function () {
        Route::resource('information-category', 'InformationCategoryController')->except('show');
        Route::resource('information', 'InformationController')->except('show');
        Route::resource('faq', 'FaqController')->except('show');
    });

    Route::group(['prefix' => 'charity', 'namespace' => 'Charity', 'name' => 'charity.', 'middleware' => 'check.role:Superadmin,Publikasi'], function () {
        Route::resource('campaign-type', 'CampaignTypeController')->except('show');
        Route::resource('campaign', 'CampaignController')->except('show');
        Route::resource('solia', 'SoliaController')->except('show');
    });

    Route::get('setting', 'SettingController@view');
    Route::post('setting', 'SettingController@action');
});