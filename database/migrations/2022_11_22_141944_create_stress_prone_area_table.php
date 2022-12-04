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
        Schema::create('stresspronearea', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger("province_id")->nullable();
            $table->unsignedBigInteger("city_id")->nullable();
            $table->unsignedBigInteger("municipality_id")->nullable();
            $table->unsignedBigInteger("barangay_id")->nullable();

            $table->json("stressEcosystem")->nullable();
            $table->integer("totalFarmers")->nullable();
            $table->integer("totalStressArea")->nullable();

            $table->dateTime("initdt")->nullable();
            $table->dateTime("upddt")->nullable();
            $table->unsignedBigInteger("initid");
            $table->unsignedBigInteger("updid");

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
        Schema::dropIfExists('stresspronearea');
    }
};
