<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Cảm ơn bạn đã gửi tin nhắn! Chúng tôi sẽ liên hệ lại với bạn sớm.');
    }

    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return view('admin.contacts.show', compact('contact'));
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Đã đánh dấu là đã đọc.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Đã xóa liên hệ.');
    }
}
