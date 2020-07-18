<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('code')->unique();
            $table->integer('amount');
            $table->string('amount_type');
            $table->integer('min_amount')->default(0);
            $table->integer('max_amount')->default(0);
            $table->integer('department_id')->nullable()->default(null);
            $table->boolean('status')->default(1);
            $table->integer('use_limit')->default(0);
            $table->integer('used_count')->default(0);
            $table->dateTime('start_time');
            $table->dateTime('finish_time');

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
        Schema::dropIfExists('discounts');
    }
}
