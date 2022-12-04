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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('password');
            $table->string('role', 50);

            $table->string("firstName", 100);
            $table->string("lastName", 100);
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

            $table->string('signature')->nullable();
            $table->string('profile_img')->nullable();

            $table->dateTime('initdt')->nullable();
            $table->dateTime('upddt')->nullable();

            $table->unsignedBigInteger('initid')->nullable();
            $table->unsignedBigInteger('updid')->nullable();

            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
