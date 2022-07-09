<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('plan_id')->nullable();
            $table->string('goal')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->integer('freq')->nullable();
            $table->double('single_payment')->nullable();
            $table->string('no_payment')->nullable();
            $table->string('amount')->nullable();
            $table->string('img')->nullable();
            $table->timestamp('next_pay_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('plan_activation')->nullable();
            $table->string('last_payment')->nullable();
            $table->string('last_payment_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
