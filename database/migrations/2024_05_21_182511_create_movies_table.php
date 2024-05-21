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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->string('title');
            $table->integer('year');
            $table->string('certificate');
            $table->integer('duration_min');
            $table->string('genre');
            $table->decimal('rate');
            $table->integer('metascore');
            $table->string('director');
            $table->text('cast');
            $table->string('votes');
            $table->text('description');
            $table->integer('review_count');
            $table->string('review_title');
            $table->text('review');
            $table->timestamps();

            /*
              0 => "Poster"
        1 => "Title"
        2 => "Year"
        3 => "Certificate"
        4 => "Duration (min)"
        5 => "Genre"
        6 => "Rating"
        7 => "Metascore"
        8 => "Director"
        9 => "Cast"
        10 => "Votes"
        11 => "Description"
        12 => "Review Count"
        13 => "Review Title"
        14 => "Review"
        */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
