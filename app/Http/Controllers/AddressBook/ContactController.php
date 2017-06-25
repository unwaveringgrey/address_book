<?php

namespace App\Http\Controllers\AddressBook;

use App\Http\Controllers\Controller;
//use App\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

//use App\Contacts\Repository as ContactRepository;

class ContactController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Contacts Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles serving, creating, updating, and deleting contacts
    |
    */
    protected $contacts;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContactRepository $contacts)
    {
        $this->contacts = $contacts;

        $this->middleware('auth');

    }

    /**
     * Query and serve a list of the User's contacts
     * @return view
     */
    public function listContacts()
    {
        $user_id = Auth::id();

        $contactList = $this->contacts->findBy('user_id', $user_id);

        return view('contact.list', ['contacts' => $contactList]);
    }

    /**
     * Create a new contact
     * @return view
     */
    public function createContact()
    {
        $user_id = Auth::id();

        $contact = $this->contacts->newContact();
        $contact->id = 0;
        $contact->user_id = $user_id;
        $email_address = $this->contacts->emailAddressFirst(null);
        $phone_number = $this->contacts->phoneNumberFirst(null);
        $address = $this->contacts->addressFirst(null);

        return view('contact.edit', ['contact' => $contact, 'email_address'=>$email_address, 'phone_number'=>$phone_number, 'address'=>$address]);
    }

    /**
     * Edit a contact
     * @param int $id
     * @return view
     */
    public function editContact($id)
    {
        $contact = $this->contacts->findById($id);
        $email_address = $this->contacts->emailAddressFirst($id);
        $phone_number = $this->contacts->phoneNumberFirst($id);
        $address = $this->contacts->addressFirst($id);

        return view('contact.edit', ['contact' => $contact, 'email_address'=>$email_address, 'phone_number'=>$phone_number, 'address'=>$address]);
    }

    /**
     * Save a contact
     * @param int $id
     * @param request $request
     * @return view
     */
    public function saveContact($id, Request $request)
    {
        //get form data
        $data = Input::all();

        $this->validate($request, [
            'name' => 'required|max:255',
            'email_address' => 'email',
            'address' => 'string|max:255',
            'number' => "regex:'^[0-9+_\- \(\)]*$'",
            'number_type' => 'alpha_dash',
        ]);

        //check if the id == 0
        //if it does, then the contact is being newly created and needs to be
        if($id == 0) {
            $user_id = Auth::id();
            $contact = $this->contacts->newContact();
            $contact->user_id = $user_id;
        } else {
            $contact = $this->contacts->findById($id);
        }

        //set the contact data here and save it, so that if this was a wholly new contact
        //the othr tables will save correctly
        $contact->name = $data['name'];
        $contact->save();

        //pull the contact_id here. Again, so that creating a contact will save it correctly
        $contact_id = $contact->id;

        $email_address = $this->contacts->emailAddressFirst($contact_id);
        $phone_number = $this->contacts->phoneNumberFirst($contact_id);
        $address = $this->contacts->addressFirst($contact_id);

        $email_address->email_address = $data['email_address'];
        $phone_number->number = preg_replace("/[^0-9]/", "", $data['number']);
        $phone_number->number_type = $data['number_type'];
        $address->address = $data['address'];

        $email_address->save();
        $phone_number->save();
        $address->save();

        return Redirect::route('contact_list');
    }

    /**
     * Delete a contact
     * @param int $id
     * @return view
     */
    public function deleteContact($id)
    {
        $contact = $this->contacts->findById($id);
//        $email_addresses = $this->contacts->emailAddresses($id);
//        $phone_numbers = $this->contacts->phoneNumbers($id);
//        $addresses = $this->contacts->addresses($id);

        $contact->delete();
//        $this->deleteCollection($email_addresses);
//        $this->deleteCollection($phone_numbers);
//        $this->deleteCollection($addresses);

        return Redirect::route('contact_list');
    }

    /**
     * A helper function to delete the contents of a collection
     * @param collection $collection
     */
    private function deleteCollection($collection)
    {
        foreach ($collection as $entity) {
            $entity->delete();
        }
    }



}
