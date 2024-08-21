<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('distination_address');
            $table->string('prefecture');
            $table->string('city');
            $table->string('current_location_address');
            $table->dateTime('meet_up_time');
            $table->string('body_condition');
            $table->unsignedBigInteger('person_number');
            $table->boolean('is_accepted');
            $table->unsignedBigInteger('senior_user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
