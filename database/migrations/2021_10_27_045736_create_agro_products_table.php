<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgroProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agro_products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tag');
            $table->integer('selling_price');
            $table->integer('discount_price')->nullable();
            $table->text('short_desc');
            $table->text('long_desc');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured_deals')->nullable();
            $table->integer('special_offers')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->integer('created_by');
            $table->integer('deleted_by');
            $table->integer('edited_by');
            $table->dateTime('deleted_on');
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
        Schema::dropIfExists('agro_products');
    }
}
