<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
    ];

    /**
     * Get the phone_numbers for the contact.
     */
    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

}
