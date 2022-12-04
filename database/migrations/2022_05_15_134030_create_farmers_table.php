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
        Schema::create('farmers', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->string("controlNumber")->nullable();

            $table->string("firstName", 100)->nullable();
            $table->string("lastName", 100)->nullable();
            $table->string("middleName", 100)->nullable();
            $table->string("suffixName", 50)->nullable();
            
            $table->string("sex")->nullable();
            $table->date("dateOfBirth")->nullable();
            $table->integer("age")->nullable();
            $table->string("phoneNumber")->nullable();

            $table->string("country", 100)->nullable();
            $table->string("streetAddress")->nullable();

            $table->unsignedBigInteger("province_id")->nullable();
            $table->unsignedBigInteger("city_id")->nullable();
            $table->unsignedBigInteger("municipality_id")->nullable();
            $table->unsignedBigInteger("barangay_id")->nullable();

            $table->unsignedBigInteger("civilStatus_id")->nullable();
            $table->string("civilStatus_specify")->nullable();
            $table->unsignedBigInteger("education_id")->nullable();
            $table->string("education_specify")->nullable();

            $table->integer("rsbsaReg")->nullable();
            $table->string("rsbsaMembership")->nullable();
            $table->string("sourceOfIncome")->nullable();
            $table->integer("farmingExperience")->nullable();

            $table->string('signature')->nullable();
            $table->string('profile_img')->nullable();

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

            $table->foreign("civilStatus_id")->references("id")->on("picklistitem");
            $table->foreign("education_id")->references("id")->on("picklistitem");
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
        Schema::dropIfExists('farmers');
    }
};
