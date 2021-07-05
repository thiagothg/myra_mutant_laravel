<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cad_product', function (Blueprint $table) {
            $table->increments('cod_product');
            $table->string('des_product', 150)->unique();
            $table->integer('qtd_storage');
            $table->float('qtd_price');
            $table->char('flg_active', 1)->nullable()->default(1);
            $table->integer('cod_category')->unsigned();
            $table->foreign('cod_category')->references('cod_category')->on('tb_cad_category');
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
        Schema::dropIfExists('products');
    }
}
