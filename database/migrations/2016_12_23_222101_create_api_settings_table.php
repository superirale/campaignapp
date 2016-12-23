<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApiSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_settings', function(Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('secret');
            $table->string('optional');
            $table->integer('brand_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('api_settings');
    }
}
