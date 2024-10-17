<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('name');
            $table->string('email');
            $table->timestamps();
        });

        // Add foreign key constraint if events table exists
        if (Schema::hasTable('events')) {
            Schema::table('event_registrations', function (Blueprint $table) {
                $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('event_registrations');
    }
};
