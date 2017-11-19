<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('no')->nullable()->index();
            $table->string('name', 512)->nullable();
            $table->string('brand')->nullable();
            $table->string('vendor_part')->nullable();
            $table->string('size')->nullable();
            $table->string('eol')->nullable();
            $table->string('warranty')->nullable();
            $table->string('weight')->nullable();
            $table->string('volume')->nullable();
            $table->string('min_packaged')->nullable();
            $table->string('sales_limit_type')->nullable();
            $table->string('groupname1')->nullable();
            $table->string('groupname2')->nullable();
            $table->string('groupname3')->nullable();
            $table->string('groupcode1')->nullable();
            $table->string('groupcode2')->nullable();
            $table->string('groupcode3')->nullable();
            $table->string('isbundle')->nullable();
            $table->string('actiondesc')->nullable();
            $table->string('actionwww')->nullable();
            $table->string('last_time_modified')->nullable();
            $table->string('vat')->nullable();
            $table->string('isnew')->nullable();

            $table->text('data')->nullable();
            $table->text('properties')->nullable();

            $table->boolean('is_image_complete')->nullable()->default(0);

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
