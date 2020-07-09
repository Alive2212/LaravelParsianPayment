<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAliveParsianPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alive_parsian_payments', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('user_id')
                ->nullable()
                ->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('order_id')
                ->nullable();

            $table->text('message')
                ->nullable();

            $table->text('token')
                ->nullable();

            $table->integer('status_code')
                ->nullable();

            $table->unsignedBigInteger('terminal_number')
                ->nullable();

            $table->unsignedBigInteger('amount')
                ->nullable();

            $table->unsignedBigInteger('rrn')
                ->nullable();

            $table->text('card_number_masked')
                ->nullable();

            $table->enum('status',
                [
                    'request',
                    'callback',
                    'callback_failed',
                    'connection_failed',
                    'confirming',
                    'confirming_failed',
                    'confirmation_failed',
                    'confirmed',
                    'reversing',
                    'reversed'
                ])->nullable();

            $table->text('base_deep_link')
                ->nullable();

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
        Schema::dropIfExists('alive_parsian_payments');
    }
}
