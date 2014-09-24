<?php


class PropertiesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('properties')->delete();
        DB::table('properties')->insert(array('label' => '01', 'name' => 'FAST 1'));
        DB::table('properties')->insert(array('label' => '02', 'name' => 'FAST 2'));
        DB::table('properties')->insert(array('label' => '03', 'name' => 'FAST 3'));
        DB::table('properties')->insert(array('label' => '04', 'name' => 'FAST 4'));
    }

}
