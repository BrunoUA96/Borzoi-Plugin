<?php namespace Borzoi\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesSubcategories extends Migration
{
    public function up()
    {
        Schema::create('borzoi_categories_subcategories', function (Blueprint $table) {
            $table->integer('child_id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->primary(['child_id', 'parent_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borzoi_categories_subcategories');
    }
}
