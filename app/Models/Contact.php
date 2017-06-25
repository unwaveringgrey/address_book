<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the phone_numbers for the contact.
     */
    public function phoneNumbers()
    {
        return $this->hasMany('App\Models\PhoneNumber');
    }

    /**
     * Get the addresses for the contact.
     */
    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    /**
     * Get the email_addresses for the contact.
     */
    public function emailAddresses()
    {
        return $this->hasMany('App\Models\EmailAddress');
    }

}
