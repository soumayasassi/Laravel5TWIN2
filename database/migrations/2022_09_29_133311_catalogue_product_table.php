<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogue_product',  function  (Blueprint  $table)  {
                                $table->id();
                        $table->unsignedBigInteger('product_id');
                        $table->unsignedBigInteger('catalogue_id');
                        $table->timestamps();
                        $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('restrict')->onUpdate('restrict');
                        $table->foreign('catalogue_id')->references('id')->on('catalogues')
            ->onDelete('restrict')->onUpdate('restrict');
                });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
