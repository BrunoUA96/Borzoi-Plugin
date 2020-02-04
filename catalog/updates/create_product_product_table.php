<?php namespace Borzoi\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePodcastPodcastTable extends Migration
{
    public function up()
    {
        Schema::create('borzoi_product_product', function(Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('second_id')->unsigned();
            $table->primary(['product_id', 'second_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('borzoi_product_product');
    }
}
