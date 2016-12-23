<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_fees', function(Blueprint $table) {
            $table->increments('id');
            $table->string('currency');
            $table->double('delivery_fee');
            $table->double('cost_per_recipient');
            $table->integer('no_of_emails_per_month');
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
        Schema::drop('campaign_fees');
    }
}
