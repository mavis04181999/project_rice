<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('farmer_id');
            
            $table->string("country", 100)->nullable();
            $table->string("streetAddress")->nullable();

            $table->unsignedBigInteger("province_id")->nullable();
            $table->unsignedBigInteger("city_id")->nullable();
            $table->unsignedBigInteger("municipality_id")->nullable();
            $table->unsignedBigInteger("barangay_id")->nullable();

            $table->string("landTenurialStatus_id")->nullable();
            $table->string("landTenurialStatus_specify")->nullable();
            $table->double("totalRiceArea")->nullable();
            $table->double("totalStressArea")->nullable();

            // Production of Palay Questionnaires

            $table->double("pp_ds_unc_question1")->nullable();
            $table->double("pp_ds_unc_question2")->nullable();
            $table->double("pp_ds_unc_question3")->nullable();
            $table->double("pp_ds_unc_question4")->nullable();
            
            $table->double("pp_ds_usc_question1")->nullable();
            $table->double("pp_ds_usc_question2")->nullable();
            $table->double("pp_ds_usc_question3")->nullable();
            $table->double("pp_ds_usc_question4")->nullable();  

            $table->double("pp_ws_unc_question1")->nullable();
            $table->double("pp_ws_unc_question2")->nullable();
            $table->double("pp_ws_unc_question3")->nullable();
            $table->double("pp_ws_unc_question4")->nullable();  

            $table->double("pp_ws_usc_question1")->nullable();
            $table->double("pp_ws_usc_question2")->nullable();
            $table->double("pp_ws_usc_question3")->nullable();
            $table->double("pp_ws_usc_question4")->nullable();
            
            $table->string("ecosystem", 100)->nullable();
            $table->json("stressEcosystem")->nullable();
            $table->string("coordinates")->nullable();
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();            

            $table->dateTime("initdt");
            $table->dateTime("upddt");
            $table->unsignedBigInteger("initid");
            $table->unsignedBigInteger("updid");

            $table->foreign("farmer_id")->references("id")->on("farmers")->onDelete('cascade');

            $table->foreign("initid")->references("id")->on("users");
            $table->foreign("updid")->references("id")->on("users");

            $table->foreign("province_id")->references("id")->on("provinces");
            $table->foreign("city_id")->references("id")->on("cities");
            $table->foreign("municipality_id")->references("id")->on("municipalities");
            $table->foreign("barangay_id")->references("id")->on("barangay");
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
};
