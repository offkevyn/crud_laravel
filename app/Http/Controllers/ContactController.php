<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contact;
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
}
