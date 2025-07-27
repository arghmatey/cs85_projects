<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'phone' => 'required|string'
        ]);

        // If validation passes, create new contact
        $contact = Contact::create($validateData);

        // Redirect to contact detail page with a success message
        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find contact by id, or return 404 if not found
        $contact = Contact::findOrFail($id);

        // Pass the contact data to the view so the form loads pre-populated
        return view('contacts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find contact by id, or return 404 if not found
        $contact = Contact::findOrFail($id);

        // Validate incoming changes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'phone' => 'required|string'
        ]);

        // Update the contact
        $contact->update($validatedData);

        // Redirect to contact detail page with a success message
        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
