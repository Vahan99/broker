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
            $table->bigInteger('floors')->nullable();
            $table->bigInteger('area')->nullable();
            $table->bigInteger('rooms')->nullable();
            $table->bigInteger('price')->nullable();
            $table->bigInteger('buildingFloors')->nullable();
            $table->bigInteger('gardenArea')->nullable();
            $table->bigInteger('faceArea')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('customerName')->nullable();
            $table->longText('info')->nullable();
            $table->bigInteger('status')->nullable();
            $table->longText('link')->nullable();
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
