<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained('states');
            $table->string('division_name')->unique();
            $table->string('division_image')->nullable();
            $table->string('division_image2')->nullable();
            $table->string('division_image3')->nullable();
            $table->longText('division_details')->nullable();
            $table->longText('division_details2')->nullable();
            $table->longText('division_details3')->nullable();
            $table->integer('division_home')->nullable();
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
        Schema::dropIfExists('divisions');
    }
}
