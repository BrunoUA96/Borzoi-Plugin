<?php namespace Borzoi\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('borzoi_catalog_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('material');
            $table->text('color');
            $table->text('height');
            $table->text('width');
            $table->text('price')->nullable();
            $table->text('sale')->nullable();
            $table->boolean('featured')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borzoi_catalog_products');
    }
}
