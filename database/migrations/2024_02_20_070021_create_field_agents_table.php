<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_agents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->longText('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('task_region')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_uber')->default(true);
            $table->boolean('is_lyft')->default(true);
            $table->boolean('is_ubereats')->default(true);
            $table->boolean('is_doordash')->default(true);
            $table->boolean('is_handy')->default(true);
            $table->boolean('is_instacart')->default(true);
            $table->boolean('is_other')->default(true);
            $table->boolean('is_null')->default(true);
            $table->integer('fieldagent_home')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('field_agents');
    }
}
