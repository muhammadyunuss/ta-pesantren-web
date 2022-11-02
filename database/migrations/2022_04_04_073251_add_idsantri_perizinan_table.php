<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdsantriPerizinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perizinan', function (Blueprint $table) {
            $table->unsignedBigInteger('santri_id_santri');
            $table->foreign('santri_id_santri')->references('id')->on('santri');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perizinan', function (Blueprint $table) {
            $table->dropForeign('santri_id_santri');
            $table->dropColumn('santri_id_santri');
        });
    }
}
