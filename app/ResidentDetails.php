<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResidentDetails extends Model
{
    protected $table = 'resident_details';
	protected $primaryKey = 'id';
	public $timestamps = false;
	
}
