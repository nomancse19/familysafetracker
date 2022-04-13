<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildUserModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_user', function (Blueprint $table) {
            $table->bigIncrements('child_user_id');
            $table->string('child_user_name');
            $table->string('child_user_number')->unique();
            $table->string('child_user_gender')->nullable();
            $table->string('child_user_email')->nullable();
            $table->bigInteger('user_id'); // Parent ID
            $table->string('user_number'); // Parent ID
            $table->string('child_user_created_user_id')->nullable();
            $table->dateTime('child_user_created_time');
            $table->integer('child_user_is_active')->default(1); //1= active and 0= deactive
            $table->text('child_user_device_id')->nullable(); 
            $table->integer('child_user_apps_login_active')->nullable(); //1= active and 0= deactive
            $table->integer('child_user_apps_location_status')->nullable(); //1= active and 0= deactive
            $table->integer('child_user_apps_net_status')->nullable(); //1= active and 0= deactive
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
        Schema::dropIfExists('child_user');
    }
}
