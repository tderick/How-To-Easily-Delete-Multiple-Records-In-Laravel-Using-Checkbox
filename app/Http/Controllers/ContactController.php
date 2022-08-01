<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $requestData = $request->all();

        Contact::create($requestData);

        return redirect('contact')->with("status", "Your message has been sent");
    }

    public function listMessages()
    {
        $messages = Contact::all();
        return view('list-messages', compact('messages'));
    }

    public function message_details($id)
    {
        $message = Contact::findOrFail($id);
        return view('details-message', compact('message'));
    }

    public function delete_message($id)
    {
        $message = Contact::find($id);

        if ($message) {
            $message->delete();
        }
        return redirect('/admin/view-messages');
    }
}
