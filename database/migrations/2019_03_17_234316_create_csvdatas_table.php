<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsvdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvdatas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->date('check_date');
            
            $table->string('grc_site_name');
            $table->string('grc_site_url');
            $table->string('grc_keyword');
            
            $table->string('y_rank')->nullable();
            $table->string('y_change')->nullable();
            $table->integer('y_count')->nullable()->unsigned()->index();
            $table->string('y_url')->nullable();
            
            $table->string('g_rank')->nullable();
            $table->string('g_change')->nullable();
            $table->integer('g_count')->nullable()->unsigned()->index();
            $table->string('g_url')->nullable();
            
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
        Schema::drop('csvdatas');
    }
}
