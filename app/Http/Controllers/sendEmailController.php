<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;



class sendEmailController extends Controller
{
    public function index(){
        return view('home');
    }

    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname'=>'required|max:20',
            'lastname'=>'required|max:20',
            'email'=>'required|max:35',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        if($validator->passes()){
            $data = array(
                    'firstname' => $request->firstname,
                    'lastname' => $request ->lastname,
                    'message' => $request ->message,
                    'phonenumber'=>$request ->phonenumber,
                    'email' => $request->input('email')
                );
            $toEmail = \App\Models\Xcomcontent::where('category', 'ToEmail')->first();
            $to = $toEmail['content'];
            Mail::to($to)->send(new SendMail($data));
            // return back()->with('success', 'Thanks for contacting us!');
            return response()->json(['success'=>true,'msg'=>'Send succeed']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
      
       
    }
       
}
