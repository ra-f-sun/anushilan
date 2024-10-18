<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    public function allContacts(){
        $contacts = Contact::all();
        return view("admin.contact",compact("contacts"));
    }
}
