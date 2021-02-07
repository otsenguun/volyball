<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('team_name')->nullable();
            $table->date('create_date')->nullable();
            $table->string('leader_name')->nullable();
            $table->string('creative_name')->nullable();
            $table->string('coach_name')->nullable();
            $table->string('sert_number')->nullable();
            $table->string('social')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twiter')->nullable();
            $table->string('instagramm')->nullable();
            $table->string('you_tube')->nullable();
            $table->longText('sponsors')->nullable();
            $table->string('image')->nullable();
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
