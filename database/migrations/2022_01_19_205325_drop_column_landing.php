<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnLanding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('landing_pages');

        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->text('name');
            $table->integer('visits');
            $table->unsignedBigInteger('headquarter_id');
            $table->foreign('headquarter_id')->references('id')->on('headquarters');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            //
        });
    }
}
