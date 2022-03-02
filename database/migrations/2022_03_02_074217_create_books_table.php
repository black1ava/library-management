<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->date('publish_date');
            $table->integer('num_of_pages');
            $table->integer('num_copies');
            $table->integer('edition');
            $table->string('publisher');
            $table->string('book_source');
            $table->unsignedBigInteger('book_type_id');
            $table->string('remark')->nullable();
            $table->foreign('book_type_id')->references('id')->on('book_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
