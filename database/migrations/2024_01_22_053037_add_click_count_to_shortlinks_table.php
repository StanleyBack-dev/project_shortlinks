<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClickCountToShortlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('short_links', function (Blueprint $table) {
        $table->unsignedBigInteger('click_count')->default(0);
    });
}

public function down()
{
    Schema::table('short_links', function (Blueprint $table) {
        $table->dropColumn('click_count');
    });
}
}
