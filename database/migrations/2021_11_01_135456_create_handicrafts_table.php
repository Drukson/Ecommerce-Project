<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandicraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handicrafts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('handicraft_name');
            $table->string('handicraft_slug');
            $table->string('handicraft_code');
            $table->string('handicraft_qty');
            $table->string('handicraft_tag');
            $table->integer('selling_price');
            $table->integer('discount_price')->nullable();
            $table->text('short_desc');
            $table->text('long_desc');
            $table->string('handicraft_thumbnail');
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
        Schema::dropIfExists('handicrafts');
    }
}
