<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoMetaCanonicalToSeoSettigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seo_settings', function (Blueprint $table) {
            $table->text('seo_meta_canonical')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seo_settings', function (Blueprint $table) {
            $table->dropColumn('seo_meta_canonical');
        });
    }
}
