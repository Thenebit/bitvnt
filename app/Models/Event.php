<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'events';

	protected $fillable = [
		'event_name',
		'event_start_date',
		'event_end_date',
		'image_url',
		'event_description'
	];
}
