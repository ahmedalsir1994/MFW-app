<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function getAllContacts()
    {
        try {
            $contacts = Contact::all()->sortBy('created_at');
            return view('admin.contact.index', compact('contacts'));
        } catch (\Exception $e) {
            // Handle case where table doesn't exist yet
            return view('admin.contact.index', ['contacts' => collect()]);
        }
    }
    public function create(Request $request)
    {
        try {
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
        } catch (\Exception $e) {
            // Handle case where table doesn't exist yet
            return redirect('/')->with('error', 'Contact form is temporarily unavailable. Please try again later.');
        }
    }


    public function getcontactById($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            return view('admin.contact.show', compact('contact'));
        } catch (\Exception $e) {
            return redirect('/contacts')->with('error', 'Contact not found or database unavailable.');
        }
    }

    public function delete($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect('/contacts')->with('success', 'Contact deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/contacts')->with('error', 'Unable to delete contact or database unavailable.');
        }
    }
}
