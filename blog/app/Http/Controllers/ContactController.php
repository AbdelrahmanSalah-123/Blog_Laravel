<?php
namespace App\Http\Controllers;

use App\Mail\contact as MailContact;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller {
    public function createForm(Request $request) {
      return view('pages.contact');
    }
    public function ContactUsForm(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required',
            'message' => 'required'
         ]);
        Contact::create($request->all());
        $data=array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        );
        Mail::to($request->email)->send(new MailContact($data));
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}