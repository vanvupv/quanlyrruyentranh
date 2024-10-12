<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhuyenmaiTable extends Migration
{
    public function up()
    {
//        Schema::create('khuyenmai', function (Blueprint $table) {

        Schema::create('discount', function (Blueprint $table) {

            $table->id();

            // The discount coupon code
            $table->string('code');

            // The human readable discount coupon code name
            $table->string('name')->nullable();

            // The description of the coupon - Not necessary
            $table->text('desc')->nullable();

            // The max uses this discount coupon has
            $table->integer('max_uses')->nullable();

            // How many times a user can use this coupon
            $table->integer('max_uses_user')->nullable();

            // Whether or not the coupon is a percentage or a fixed price
            $table->enum('type', ['percent', 'fixed'])->default('fixed');

            // The amount to discount based on type
            $table->double('discount_amount', 10, 2);

            // The amount to discount based on type
            $table->double('min_amount', 10, 2)->nullable();

            //
            $table->integer('status')->default(1);

            // When the coupon begins
            $table->timestamp('starts_at')->nullable();

            // When the coupon ends
            $table->timestamp('expires_at')->nullable();

            $table->timestamps();

//            $table->id();
//            $table->string('code');
//            $table->double('reward');
//            $table->string('type');
//            $table->text('desc');
//            $table->integer('limit');
//            $table->json('productExclude')->nullable();
//            $table->json('productApply')->nullable();
//            $table->json('categoryExclude')->nullable();
//            $table->json('categoryApply')->nullable();
//            $table->date('expires');
//            $table->string('status');
//            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('discount');
    }
};

