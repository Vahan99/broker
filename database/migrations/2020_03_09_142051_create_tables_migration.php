<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('name')->nullable();
            $table->longText('address')->nullable();
            $table->longText('email')->nullable();
            $table->boolean('display')->default(0);
            $table->bigInteger('phone')->nullable();
            $table->longText('tax_id')->nullable();
            $table->timestamps();
        });
        Schema::create('company_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('company_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('reality', function (Blueprint $table){
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

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('regions', function (Blueprint $table){
            $table->increments('id');
            $table->longText('name');
            $table->timestamps();
        });
        Schema::create('sub_regions', function (Blueprint $table){
            $table->increments('id');
            $table->longText('name');
            $table->bigInteger('region_id');
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
        Schema::dropIfExists('company_users');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('regions');
        Schema::dropIfExists('sub_regions');
        Schema::dropIfExists('reality');
    }
}
