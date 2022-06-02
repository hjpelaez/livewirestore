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
        Schema::create('contact_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('identification', 50);
            $table->string('email', 80);
            $table->string('extra', 255);
            $table->foreignId('contact_general_id')->onDelete('cascade');
            $table->enum('choices', ['post', 'advertising', 'course', 'video', 'photo', 'other']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_companies');
    }
};
