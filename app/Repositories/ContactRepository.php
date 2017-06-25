<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{

    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function findBy($arg1, $arg2)
    {
        return $this->contact->where($arg1, $arg2)->get();
    }

    public function findById($id)
    {
        return $this->contact->find($id);
    }

    public function newContact()
    {
        return new Contact();
    }

    public function emailAddresses($id)
    {
        return $this->contact->find($id)->emailAddresses()->get();
    }

    public function addresses($id)
    {
        return $this->contact->find($id)->addresses()->get();
    }

    public function phoneNumbers($id)
    {
        return $this->contact->find($id)->phoneNumbers()->get();
    }

    public function emailAddressFirst($id)
    {
        if($id == null) {
            return $this->contact->emailAddresses()->firstOrNew([]);
        }

        return $this->contact->find($id)->emailAddresses()->firstOrNew([]);
    }

    public function addressFirst($id)
    {
        if($id == null) {
            return $this->contact->addresses()->firstOrNew([]);
        }

        return $this->contact->find($id)->addresses()->firstOrNew([]);
    }

    public function phoneNumberFirst($id)
    {
        if($id == null) {
            return $this->contact->phoneNumbers()->firstOrNew([]);
        }

        return $this->contact->find($id)->phoneNumbers()->firstOrNew([]);
    }


}

?>