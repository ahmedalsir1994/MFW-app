<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function getAllContacts()
    {
        $contacts = Contact::all()->sortBy('created_at');
        return view('admin.contact.index', compact('contacts'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'nullable|string|max:20',
            'job_title' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ]);

        Contact::create($validatedData);

        return redirect('/')->with('success', 'we will contact you soon!');
    }


    public function getcontactById($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted successfully!');
    }
}
