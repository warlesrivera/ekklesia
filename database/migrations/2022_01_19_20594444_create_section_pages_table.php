<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_pages', function (Blueprint $table) {
            $table->id();
            $table->text('style');
            $table->integer('position');
            $table->boolean('state');
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('text_short',200)->nullable();
            $table->text('description')->nullable();
            $table->text('images')->nullable();
            $table->text('images_principal')->nullable();
            $table->text('position_title')->nullable();
            $table->text('position_subtitle')->nullable();
            $table->text('position_short')->nullable();
            $table->text('position_description')->nullable();
            $table->text('position_images')->nullable();
            $table->text('position_images_principal')->nullable();
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('page_sections');
            $table->softDeletes();
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
        Schema::dropIfExists('section_pages');
    }
}
