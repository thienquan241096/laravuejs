<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('sender_id')->comment('Người gửi');
            $table->integer('receiver_id')->nullable()->comment('Người nhận');
            $table->integer('group_id')->nullable();
            $table->text('message')->nullable()->comment('Tin nhắn');
            $table->string('file')->nullable();
            $table->tinyInteger('type')->default(1);
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
        Schema::dropIfExists('conversations');
    }
}
