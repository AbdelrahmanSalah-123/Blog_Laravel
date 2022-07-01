<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Mail\newsletter;

class MailController extends Controller
{
    public function sendMail(){
        $email=$_GET['email'];
        Mail::to($email)->send(new newsletter());
        return redirect('Home')->with('success','Subscribed');
    }
}