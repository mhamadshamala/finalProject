<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('contact.index',compact('contacts'));
    }
    public function create(){
        $contacts = Contact::get();
        return view('contact.create', [
            'contacts' => $contacts
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'username'=>'required',
            'useremail'=>'required',
            'userphone'=>'required',
        ]);
         $contact = new Contact();

         $contact->name = $request->username;
         $contact->email = $request->useremail;
         $contact->phone = $request->userphone;

         $contact->save();

         return redirect()->route('index-contact');

    }

    public function edit(Contact $contact){
     // $contact = Co ntact::findOrFail($id);
     return view('contact.create', compact('contact'));
    }

    public function update(Request $request, Contact $contact){
     $request->validate([
         'username'=>'required',
         'useremail'=>'required',
         'userphone'=>'required',
     ]);


         $contact->name = $request->username;
         $contact->email = $request->useremail;
         $contact->phone = $request->userphone;

         $contact->save();

         return redirect('/contact');
    }

    public function destroy($id){

     $task=Contact::find($id);
     $task->delete();

     return redirect()->back();
 }
}
