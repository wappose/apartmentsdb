<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('firstname',50);
			$table->string('lastname',50);
			$table->string('email',50)->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('mobile', 20)->nullable();
			$table->string('address', 20)->nullable();
			$table->string('postalcode', 8)->nullable();
			$table->string('postaladdress', 30)->nullable();
			$table->text('comments')->nullable();

			$table->softDeletes();
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
		Schema::drop('people');
	}
}
