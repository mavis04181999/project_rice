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
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("province_id");
            $table->string("city");
            $table->string("code");
            $table->dateTime("initdt");
            $table->dateTime("upddt");
            $table->unsignedBigInteger("initid");
            $table->unsignedBigInteger("updid");

            $table->foreign("province_id")->references("id")->on("provinces")->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("initid")->references("id")->on("users");
            $table->foreign("updid")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
