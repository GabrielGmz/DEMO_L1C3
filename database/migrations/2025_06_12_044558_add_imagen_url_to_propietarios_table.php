<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('propietarios', function (Blueprint $table) {
        $table->string('imagen_url')->nullable();
    });
}

public function down()
{
    Schema::table('propietarios', function (Blueprint $table) {
        $table->dropColumn('imagen_url');
    });
}
};
