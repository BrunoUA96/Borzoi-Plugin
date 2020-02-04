<?php namespace Borzoi\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesProduct extends Migration
{
    public function up()
    {
        Schema::create('borzoi_category_product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('product_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borzoi_category_product');
    }
}
