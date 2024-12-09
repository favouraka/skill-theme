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
        //
        Schema::dropColumns('testimonials', ['age', 'description', 'image']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        $table->integer('age');
        $table->text('description');
        $table->string('image');
    }
};
