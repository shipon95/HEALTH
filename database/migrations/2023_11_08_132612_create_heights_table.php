<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heights', function (Blueprint $table) {
            $table->id();

            $table->float('name')->comment('体重');
            $table->unsignedBigInteger('user_id')->comment('このタスクの所有者');
            $table->foreign('user_id')->references('id')->on('users'); // 外部キー制約
           //$table->timestamps();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heights');
    }
}
