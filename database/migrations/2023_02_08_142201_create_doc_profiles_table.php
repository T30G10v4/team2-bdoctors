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
        Schema::create('doc_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('curriculum_vitae')->nullable();
            $table->string('photo')->nullable();
            $table->string('studio_address')->nullable();
            $table->string('tel', 20)->nullable();
            $table->text('services')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('doc_profiles');
    }
};
