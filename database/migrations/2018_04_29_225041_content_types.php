<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\ContentType;

class ContentTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_types', function($table)
        {
            $table->increments('id');
            $table->string('type', 128);
        });

        $data = [
            ['type'=>'text'],
            ['type'=>'video'],
            ['type'=>'reference']
        ];

        ContentType::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_types');
    }
}
