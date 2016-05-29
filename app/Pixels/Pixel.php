<?php

namespace App\Pixels;

use Illuminate\Database\Eloquent\Model;

class Pixel extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'popupTrigger', 'popupLocation',
    ];
	
	
}
