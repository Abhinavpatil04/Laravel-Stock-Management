<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author');
            $table->string('publication');
            $table->string('edition');
            $table->string('cost');
            $table->string('language');
            $table->string('pages');
            $table->longText('description')->nullable();
            $table->string('rfid_tag')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
