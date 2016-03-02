<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carts', function (Blueprint $table) {
			//
			$table->increments('id');
			$table->integer('userid');
			$table->integer('productid');
			$table->integer('price');
			$table->integer('quantity');
			$table->integer('total');
			$table->integer('status');
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
		Schema::table('carts', function (Blueprint $table) {
			//
			$table->drop();
		});
	}

}
