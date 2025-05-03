<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // todo_listテーブルの作成
        Schema::create('todo_list', function (Blueprint $table) {
            $table->id('list_id');
            $table->string('list_name');
            $table->dateTime('list_last_update')->default(now());
            $table->timestamps();
        });

        // todo_contentテーブルの作成
        Schema::create('todo_content', function (Blueprint $table) {
            $table->id('content_id');
            $table->foreignId('list_id')->constrained('todo_list', 'list_id')->onDelete('cascade');
            $table->string('content_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_content');
        Schema::dropIfExists('todo_list');
    }
};
