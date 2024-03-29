<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contact;
use App\Http\Requests\Contact\ContactStoreUpdateRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $contacts = Contact::orderBy('name')->paginate(6);

            return view('contact/index', ['contacts' => $contacts]);
        } catch (Exception) {
            $empty = new LengthAwarePaginator([], 0, 6);

            return view('Contact/index', ['contacts' => $empty, 'resposta' => 500]);
        }
    }

    public function create()
    {
        try {
            return view('contact/create');
        } catch (Exception) {
            return redirect()->route('contacts-index')->with('resposta', 500);
        }
    }

    public function store(ContactStoreUpdateRequest $request)
    {
        try {
            $data = $request->all();

            Contact::create($data);

            return redirect()->route('contacts-create')->with('resposta', 200);
        } catch (\Exception) {
            return redirect()->route('contacts-index')->with('resposta', 500);
        }
    }

    public function edit($id)
    {
        try {
            $contact = $this->exist($id);


            if (!empty($contact)) {
                return view('Contact/edit', ['contact' => $contact]);
            } else
                return redirect()->route('contacts-index')->with('resposta', 400);
        } catch (\Exception) {
            return redirect()->route('contacts-index')->with('resposta', 500);
        }
    }

    public function update(ContactStoreUpdateRequest $request, $id)
    {
        try {
            if (!empty($this->exist($id))) {
                $data = [
                    'name' => $request->name,
                    'contact' => $request->contact,
                    'email' => $request->email,
                ];

                Contact::where('id', $id)->update($data);

                return redirect()->route('contacts-index')->with('resposta', 200);
            } else
                return redirect()->route('contacts-index')->with('resposta', 400);
        } catch (\Exception) {
            return redirect()->route('contacts-index')->with('resposta', 500);
        }
    }

    public function show($id)
    {
        try {
            $contact = $this->exist($id);

            if (!empty($contact)) {
                return view('contact/details', ['contact' => $contact]);
            } else
                return redirect()->route('contacts-index')->with('resposta', 400);
        } catch (\Exception) {
            return redirect()->route('contacts-index')->with('resposta', 500);
        }
    }

    public function showJson($id)
    {
        try {
            $contact = $this->exist($id);

            if (!empty($contact)) {
                return response()->json($contact, 200);
            } else
                return response()->json([], 200);
        } catch (\Exception) {
            return response()->json([], 200);
        }
    }

    public function destroy($id)
    {
        try {
            if (!empty($this->exist($id))) {

                Contact::where('id', $id)->delete();

                return redirect()->route('contacts-index')->with('resposta', 200);
            } else
                return redirect()->route('contacts-index')->with('resposta', 400);
        } catch (\Exception) {
            return redirect()->route('contacts-index')->with('resposta', 500);
        }
    }

    public function exist($id)
    {
        $contact = Contact::where('id', $id)->first();

        return $contact;
    }
}
