<?php namespace Borzoi\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class DroppingColumnTable extends Migration
{
    public function up()
    {
        Schema::table('borzoi_catalog_products', function (Blueprint $table) {
            $table->dropColumn('material');
            $table->dropColumn('color');
            $table->dropColumn('height');
            $table->dropColumn('width');
        });
    }

    public function down()
    {
        Schema::dropIfExists('borzoi_catalog_products');
    }
}
