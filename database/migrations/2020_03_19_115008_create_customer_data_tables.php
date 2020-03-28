<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('name')->nullable();
            $table->longText('surname')->nullable();
            $table->longText('email')->nullable();
            $table->longText('first_phone')->nullable();
            $table->longText('last_phone')->nullable();
            $table->integer('customer');
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('customer_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('buildingFloorsMin')->nullable();
            $table->bigInteger('buildingFloorsMax')->nullable();
            $table->bigInteger('floorMin')->nullable();
            $table->bigInteger('floorMax')->nullable();
            $table->bigInteger('areaMin')->nullable();
            $table->bigInteger('areaMax')->nullable();
            $table->bigInteger('roomsMin')->nullable();
            $table->bigInteger('roomsMax')->nullable();
            $table->bigInteger('priceMin')->nullable();
            $table->bigInteger('priceMax')->nullable();
            $table->bigInteger('gardenMin')->nullable();
            $table->bigInteger('gardenMax')->nullable();
            $table->bigInteger('facePartMin')->nullable();
            $table->bigInteger('facePartMax')->nullable();

            $table->bigInteger('type')->nullable();
            $table->bigInteger('realityType')->nullable();
            $table->bigInteger('proect')->nullable();
            $table->bigInteger('buildingType')->nullable();
            $table->bigInteger('cosmetic')->nullable();
            $table->bigInteger('balcon')->nullable();
            $table->bigInteger('region')->nullable();
            $table->bigInteger('subRegion')->nullable();
            $table->longText('street')->nullable();
            $table->longText('buildingNumber')->nullable();
            $table->longText('apartamentNumber')->nullable();
            $table->longText('customerName')->nullable();
            $table->bigInteger('status')->nullable();
            $table->longText('code')->nullable();
            $table->tinyInteger('firstFloor')->nullable();
            $table->tinyInteger('lastFloor')->nullable();

            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('customer_filters');
        Schema::dropIfExists('customers');
    }
}
