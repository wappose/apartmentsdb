<?php

class Property extends \Eloquent {
    protected $table = 'properties';
	protected $fillable = [];

    public function designations()
    {
        return $this->hasMany('Propertydesignation', 'propertydesignation_id');
    }

}
