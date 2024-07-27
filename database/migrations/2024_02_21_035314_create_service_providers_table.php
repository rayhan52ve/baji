<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->longText('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('base_region')->nullable();
            $table->integer('radius_in_mile')->nullable();
            $table->string('vendor_w9_image')->nullable();
            $table->string('vendor_col_image')->nullable();
            $table->string('vendor_certification_image')->nullable();
            $table->boolean('is_airductcleaning')->default(true);
            $table->boolean('is_appliance')->default(true);
            $table->boolean('is_carpetcleaner')->default(true);
            $table->boolean('is_cleaner')->default(true);
            $table->boolean('is_commonareacleaning')->default(true);
            $table->boolean('is_damage')->default(true);
            $table->boolean('is_electrician')->default(true);
            $table->boolean('is_exterminator')->default(true);
            $table->boolean('is_fireplaceservices')->default(true);
            $table->boolean('is_flooring')->default(true);
            $table->boolean('is_fullturnover')->default(true);
            $table->boolean('is_garagedoor')->default(true);
            $table->boolean('is_gardener')->default(true);
            $table->boolean('is_generalcontractor')->default(true);
            $table->boolean('is_glassandmirrors')->default(true);
            $table->boolean('is_handyman')->default(true);
            $table->boolean('is_homeinspector')->default(true);
            $table->boolean('is_hvac')->default(true);
            $table->boolean('is_lawncare')->default(true);
            $table->boolean('is_leadinspection')->default(true);
            $table->boolean('is_lockchange')->default(true);
            $table->boolean('is_locksmith')->default(true);
            $table->boolean('is_moldremediation')->default(true);
            $table->boolean('is_noheat')->default(true);
            $table->boolean('is_painter')->default(true);
            $table->boolean('is_plumber')->default(true);
            $table->boolean('is_plumberwater')->default(true);
            $table->boolean('is_poolcleaning')->default(true);
            $table->boolean('is_poolmaintenance')->default(true);
            $table->boolean('is_poolrepair')->default(true);
            $table->boolean('is_repair')->default(true);
            $table->boolean('is_roofer')->default(true);
            $table->boolean('is_secinspector')->default(true);
            $table->boolean('is_sewagebackup')->default(true);
            $table->boolean('is_sewagecleanup')->default(true);
            $table->boolean('is_snowremoval')->default(true);
            $table->boolean('is_tilecontractor')->default(true);
            $table->integer('serviceproviders_home')->nullable();
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
        Schema::dropIfExists('service_providers');
    }
}
