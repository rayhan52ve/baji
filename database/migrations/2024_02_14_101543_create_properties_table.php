<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_title')->nullable();
            $table->string('location')->nullable();
            $table->smallInteger('room_number')->nullable();
            $table->string('land_area')->nullable();
            $table->string('build_year')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->longText('property_details')->nullable();
            $table->integer('property_home')->nullable();
            $table->integer('status')->default(1)->comment("1= active; 0=deactive");
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
        Schema::dropIfExists('properties');
    }
}
