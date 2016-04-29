<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('customers'))

        Schema::create ('customers', function (Blueprint $table)
        {
          $table->increments ('id');
          $table->string ('name_company', 255);
          $table->string ('name_contact', 255);
          $table->string ('street', 255);
          $table->string ('nr', 11);
          $table->string ('bus', 11);
          $table->string ('zip', 11);
          $table->string ('city', 255);
          $table->string ('country', 255);
          $table->string ('phone', 255);

          $table->softDeletes ();
          $table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists ('users');
    }
}
