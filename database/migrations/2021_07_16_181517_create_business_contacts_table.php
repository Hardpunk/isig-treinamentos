<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessContactsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_contacts', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 150);
            $table->string('role', 150);
            $table->string('phone', 20);
            $table->string('email', 140);
            $table->string('message', 255);
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
        Schema::drop('business_contacts');
    }
}
