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
        Schema::create('tb_post', function (Blueprint $table) {
            $table->increments('BlogId');
            $table->string('Name',250);
            $table->string('Description',4000);
            $table->text('Detail');
            $table->string('Image',500);
            $table->integer('IsActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_post');
    }
};
