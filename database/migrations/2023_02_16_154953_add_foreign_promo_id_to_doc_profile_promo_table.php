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
        Schema::table('doc_profile_promo', function (Blueprint $table) {
            $table->unsignedBigInteger('promo_id')->after('id');
            $table->foreign('promo_id')->references('id')->on('promos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doc_profile_promo', function (Blueprint $table) {
            $table->dropForeign('doc_profile_promo_promo_id_foreign');
            $table->dropColumn('promo_id');
        });
    }
};
