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
        Schema::create('farm_extended', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("farm_id");

            // Page 3: Validation
            $table->json("page3_source_id")->nullable();
            $table->string("page3_source_specify")->nullable();
            $table->json("page3_frequency")->nullable();

            $table->integer("page3_flashflood_waterlevel") ->nullable();
            $table->integer("page3_flashflood_days")->nullable();
            $table->integer("page3_flashflood_hours")->nullable();

            $table->integer("page3_intermittent_waterlevel")->nullable();
            $table->integer("page3_intermittent_days")->nullable();
            $table->integer("page3_intermittent_hours")->nullable();

            $table->integer("page3_stagnant_waterlevel")->nullable();
            $table->integer("page3_stagnant_days")->nullable();
            $table->integer("page3_stagnant_hours")->nullable();

            $table->integer("page3_all_waterlevel")->nullable();
            $table->integer("page3_all_days")->nullable();
            $table->integer("page3_all_hours")->nullable();

            $table->json("page3_occurenceofflood_ds_months")->nullable();
            $table->string("page3_occurenceofflood_ds_remarks")->nullable();
            $table->json("page3_occurenceofflood_ws_months")->nullable();
            $table->string("page3_occurenceofflood_ws_remarks")->nullable();

            // Page 4: Validation

            $table->json("page4_source_id")->nullable();
            $table->string("page4_source_specify")->nullable();
            $table->json("page4_frequency")->nullable();

            $table->json("page4_occurenceofsalinity_ds_months")->nullable();
            $table->string("page4_occurenceofsalinity_ds_remarks")->nullable();
            $table->json("page4_occurenceofsalinity_ws_months")->nullable();
            $table->string("page4_occurenceofsalinity_ws_remarks")->nullable();

            $table->json("page4_checkbox_sourceOfIrrigation")->nullable();
            $table->string("page4_sourceOfIrrigation_specify")->nullable();
            $table->json("page4_sourceOfIrrigation_saltfree")->nullable();

            $table->json("page4_indicatorofsalinity")->nullable();
            $table->string("page4_indicatorofsalinity_specify")->nullable();

            // Page 5: Validation

            $table->json("page5_frequency")->nullable();

            $table->json("page5_occurenceofdrought_ds_months")->nullable();
            $table->string("page5_occurenceofdrought_ds_remarks")->nullable();
            $table->json("page5_occurenceofdrought_ws_months")->nullable();
            $table->string("page5_occurenceofdrought_ws_remarks")->nullable();

            $table->json("page5_checkbox_sourceOfIrrigation")->nullable();
            $table->string("page5_sourceOfIrrigation_specify")->nullable();
            $table->json("page5_sourceOfIrrigation_saltfree")->nullable();

            $table->json("page5_indicatorofdrought")->nullable();
            $table->string("page5_indicatorofdrought_specify")->nullable();

            $table->dateTime("initdt");
            $table->dateTime("upddt");
            $table->unsignedBigInteger("initid");
            $table->unsignedBigInteger("updid");

            $table->foreign("farm_id")->references("id")->on("farms")->onDelete('cascade');
            $table->foreign("initid")->references("id")->on("users");
            $table->foreign("updid")->references("id")->on("users");
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
        Schema::dropIfExists('farm__extendeds');
    }
};
