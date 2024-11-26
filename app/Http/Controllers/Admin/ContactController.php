<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.contact.contact', ['title' => 'Danh Sách Liên Hệ'], compact('contacts'));
    }

    public function destroy(Request $request)
    {
        $contact = Contact::find($request->input('id'));
        if ($contact) {
            $contact->delete();
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công liên hệ'
            ]);
        }

        return response()->json(['error' => true]);
    }
    
}
