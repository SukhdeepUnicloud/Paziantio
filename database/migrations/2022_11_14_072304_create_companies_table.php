<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('address_street')->nullable();
            $table->string('address_street_no')->nullable();
            $table->string('address_street_postalcode')->nullable();
            $table->string('address_city')->nullable();
            $table->string('phone')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('tax_no')->nullable();
            $table->string('logo')->nullable();
            $table->text('path')->nullable();
            $table->string('website')->nullable();
            $table->string('company_type')->nullable();
            $table->string('register')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
