<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('section_id');
            $table->string('nm_page');
            $table->string('ic_page')->nullable();
            $table->string('ds_url')->nullable();
            $table->integer('page_id');
            $table->integer('fl_active');
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('section_menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
