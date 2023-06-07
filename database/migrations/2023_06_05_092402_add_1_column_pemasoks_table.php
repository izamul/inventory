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
        Schema::table('Pemasok', function (Blueprint $table) {
            $table->string('fotoPemasok')->after('telpPemasok')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Pemasok', function (Blueprint $table) {
            $table->dropColumn('Pemasok');
        });
    }
};
