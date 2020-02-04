<?php namespace Borzoi\SlideShow\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSlideshowsTable extends Migration
{
    public function up()
    {
        Schema::create('borzoi_slideshow_slideshows', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('theme')->nullable();
            $table->string('pagina')->nullable();
            $table->boolean('is_visible')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borzoi_slideshow_slideshows');
    }
}
