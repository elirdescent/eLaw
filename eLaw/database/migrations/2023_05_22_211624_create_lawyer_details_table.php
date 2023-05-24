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
        Schema::create('lawyer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lawyer_id');
            $table->foreign('lawyer_id')->references('id')->on('users')->unique();
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->string('username', 255)->unique();
            $table->string('city', 255);
            $table->string('address', 255);
            $table->string('country', 255);
            $table->string('job', 255);
            $table->string('pricing', 255);
            $table->string('bio', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer_details');
    }
};
