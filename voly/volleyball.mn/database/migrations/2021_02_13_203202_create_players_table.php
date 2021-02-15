<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('frist_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('huviin_number')->nullable();
            $table->string('player_type')->nullable();
            $table->string('team_id')->nullable();
            $table->string('total_match')->nullable();
            $table->string('total_score')->nullable();
            $table->string('total_mvp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twiter')->nullable();
            $table->string('instagramm')->nullable();
            $table->string('you_tube')->nullable();
            $table->longText('details')->nullable();
            $table->longText('statistik')->nullable();
            $table->string('weight')->nullable();
            $table->string('lenght')->nullable();
            $table->string('country')->nullable();
            $table->string('country_live')->nullable();
            $table->string('brithday')->nullable();
            $table->string('background_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->longText('carrer')->nullable();
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
        Schema::dropIfExists('players');
    }
}
