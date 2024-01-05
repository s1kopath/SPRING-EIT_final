<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutdescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_descriptions', function (Blueprint $table) {
            $table->id();
            $table->longText('about_description')->nullable();
            $table->string('sub_title_one',255)->nullable();
            $table->longText('sub_one')->nullable();
            $table->string('sub_title_two',255)->nullable();
            $table->longText('sub_two')->nullable();
            $table->string('sub_title_three',255)->nullable();
            $table->longText('sub_three')->nullable();
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
        Schema::dropIfExists('about_descriptions');
    }
}
