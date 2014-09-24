<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApartmentsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buildings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('label', 20)->nullable();
			$table->string('name')->nullable();
			$table->string('city', 30)->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unique('label');
		});
		Schema::create('properties', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('building_id')->unsigned();
			$table->string('designation', 30)->nullable();
			$table->string('address', 120)->nullable();
			$table->string('postalcode', 8)->nullable();
			$table->string('postaladress', 30)->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->foreign('building_id')
				->references('id')
				->on('buildings')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->unique('designation');
		});

		Schema::create('propertyobjecttypes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('number')->unsigned()->nullable();
			$table->char('group', 2)->nullable();
			$table->string('name', 50)->nullable();
			$table->string('kitchentype', 10)->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unique('name');
		});

		Schema::create('propertyobjects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('property_id')->unsigned();
			$table->integer('propertyobjecttype_id')->unsigned()->nullable();
			$table->integer('number')->unsigned()->nullable();
			$table->integer('deciding_number')->unsigned()->nullable();
			$table->integer('floor')->unsigned()->nullable();
			$table->integer('roomcount')->unsigned()->nullable();
			$table->integer('area')->unsigned()->nullable();
			$table->decimal('rent', 10, 2)->unsigned()->nullable();

			$table->softDeletes();
			$table->timestamps();
			$table->foreign('property_id')
				->references('id')->on('properties')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->foreign('propertyobjecttype_id')
				->references('id')->on('propertyobjecttypes')
				->onDelete('set null')
				->onUpdate('cascade');
			$table->unique('number');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('propertyobjects');
		Schema::drop('propertyobjecttypes');
		Schema::drop('properties');
		Schema::drop('buildings');
	}

}
