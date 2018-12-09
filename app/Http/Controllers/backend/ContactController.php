<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contact;
use App\FormType;
use App\Form;

class ContactController extends Controller
{
    public function getHome(){
      $contacts= Contact::orderBy('created_at', 'desc')->get();
      return view('backend.contacts.list-home',compact('contacts')); 

    }
}
