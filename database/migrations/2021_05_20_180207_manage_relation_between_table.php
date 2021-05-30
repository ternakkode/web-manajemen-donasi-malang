<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManageRelationBetweenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->foreign('campaign_type_id')->references('id')->on('campaign_types')->onDelete('cascade');
        });

        Schema::table('campaign_photos', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });

        Schema::table('informations', function (Blueprint $table) {
            $table->foreign('information_category_id')->references('id')->on('information_categories')->onDelete('cascade');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
        
        Schema::table('solias', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('solia_photos', function (Blueprint $table) {
            $table->foreign('solia_id')->references('id')->on('solias')->onDelete('cascade');
        });

        Schema::table('outcomes', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropForeign(['campaign_type_id']);
        });

        Schema::table('campaign_photos', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
        });

        Schema::table('informations', function (Blueprint $table) {
            $table->dropForeign(['information_category_id']);
            $table->dropForeign(['campaign_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::table('solias', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('solia_photos', function (Blueprint $table) {
            $table->dropForeign(['solia_id']);
        });

        Schema::table('outcomes', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
