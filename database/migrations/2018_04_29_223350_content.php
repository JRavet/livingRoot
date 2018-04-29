<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Content extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function($table)
        {
            $table->bigIncrements('id');
            $table->integer('content_type_id')->unsigned();
            $table->bigInteger('resource_id')->unsigned();
            $table->smallInteger('position')->unsigned();
            $table->text('content');
            $table->timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
