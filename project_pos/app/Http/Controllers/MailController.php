<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotaEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
 
		Mail::to("testing@adib.com")->send(new NotaEmail());
 
		return redirect('admin/orders');
 
	}
}
