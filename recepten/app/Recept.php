<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recept extends ModeL
{
	protected $table = "recepten";

	protected $fillable = [
     'titel',
	'catagorieId',
	'beschrijving',
	'ingredienten',
	'gebruikerId',
	'foto',
    ];
}
