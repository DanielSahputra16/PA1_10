<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToReservasisTable extends Migration
{
    public function up()
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
