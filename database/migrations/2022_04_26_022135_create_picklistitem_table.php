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
        Schema::create('picklistitem', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("pick_list_id");
            $table->text("Picklistitem");
            $table->integer("position");
            $table->dateTime("initdt");
            $table->dateTime("upddt");
            $table->unsignedBigInteger("initid");
            $table->unsignedBigInteger("updid");

            $table->foreign("pick_list_id")->references("id")->on("picklist");
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
        Schema::dropIfExists('pick_list_items');
    }
};
