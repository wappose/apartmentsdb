<?php

class Person extends \Eloquent {
    protected $table = 'people';
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}
