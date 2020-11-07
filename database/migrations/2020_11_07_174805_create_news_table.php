<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->text('short_text')->comment('Короткий текст новости');
            $table->text('full_text')->comment('Полный текст новости');
            $table->string('photo',1000)->nullable(false)->default('');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('source_id')->constrained('sources');
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
        Schema::dropIfExists('news');
    }
}
