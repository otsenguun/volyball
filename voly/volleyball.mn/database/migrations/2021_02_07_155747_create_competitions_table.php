<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('create_date')->nullable();
            $table->string('address')->nullable();
            $table->string('uzegch_count')->nullable();
            $table->string('status')->nullable();
            $table->integer('score_main')->nullable();
            $table->integer('score_second')->nullable();
            $table->string('winner')->nullable();
            $table->string('mvp_main')->nullable();
            $table->string('mvp_second')->nullable();
            $table->string('mvp_main_info')->nullable();
            $table->string('mvp_second_info')->nullable();
            $table->integer('set_count')->nullable();
            $table->longText('sets')->nullable();
            $table->string('image')->nullable();
            $table->string('background_image')->nullable();
            $table->longText('details')->nullable();
            $table->longText('match_status')->nullable();
            $table->longText('match_guide')->nullable();
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
        Schema::dropIfExists('competitions');
    }
}
