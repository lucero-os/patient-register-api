<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('language_code');
            $table->string('language_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
