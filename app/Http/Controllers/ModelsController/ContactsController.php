<?php

namespace App\Http\Controllers\ModelsController;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function index()
    {
        $contacts = Contact::orderBy('type')->Paginate(7);
        return view('contacts.index', compact('contacts'));
    }

    public function index_users()
    {
        return view('/contacts');
    }

    //Mostra un SINGOLO SPECIFICO oggetto
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    //Mostra una vista per creare un nuovo oggetto
    public function create()
    {
        return view('contacts.create');
    }

    //inserisce l'oggetto nel DB
    public function store(Request $request)
    {
        $this->validateContact($request);

        Contact::create($request->all());
        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    //Mostra una vista per modificare un oggetto esistente

    protected function validateContact(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|max:255|string',
            'contact_string' => 'required|max:255|string',
        ]);
    }

    //aggiorana nel database l'oggetto con la modifica

    public function edit(Contact $contact)
    {
        //compact è un modo veloce per scrivere ['article' => $article]
        return view('contacts.edit', compact('contact'));
    }

    //elimina l'oggetto dal database

    public function update(Contact $contact, Request $request)
    {
        $this->validateContact($request);
        $contact->update($request->all());
        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully');
    }

}
