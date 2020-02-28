<?php namespace Borzoi\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;


class AddColumnOrder extends Migration
{
    public function up()
    {
        Schema::table('borzoi_catalog_products', function(Blueprint $table) {
            $table->integer('order')->unsigned();
        });
    }

    public function down()
    {
      Schema::table('borzoi_catalog_products', function ($table) {
                $table->dropColumn('order');
              });
    }
}
