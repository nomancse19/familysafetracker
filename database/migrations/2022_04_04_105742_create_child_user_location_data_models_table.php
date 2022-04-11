<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildUserLocationDataModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_user_location_data', function (Blueprint $table) {
            $table->bigIncrements('child_user_location_id');
            $table->string('child_user_location_lat');
            $table->string('child_user_location_lon');
            $table->integer('child_user_location_emergency_is')->nullable(); // 1=emergency 0 = not
            $table->integer('child_user_id');
            $table->bigInteger('admin_user_id');
            $table->integer('user_type');
            $table->dateTime('child_user_location_time');
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
        Schema::dropIfExists('child_user_location_data');
    }
}
