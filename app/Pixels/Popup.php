<?php

namespace App\Pixels;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'popupTrigger', 'popupLocation',
    ];
	
	    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
