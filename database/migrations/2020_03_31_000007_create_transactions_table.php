<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('isReturned');
            $table->date('returnDate');
            $table->dateTime('returnedOn')->nullable();
            $table->dateTime('issueDate');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
