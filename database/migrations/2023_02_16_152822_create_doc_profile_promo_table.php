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
        Schema::create('doc_profile_promo', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('doc_profile_id');
            //$table->foreign('doc_profile_id')->references('id')->on('doc_profiles')->onDelete('set null');
            //$table->unsignedBigInteger('promo_id');
            //$table->foreign('promo_id')->references('id')->on('promos')->onDelete('set null');
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
        Schema::dropIfExists('doc_profile_promo');
    }
};
