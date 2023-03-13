<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\MSME;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class RegisterController extends Controller
{
    public function indexMSME(){
        $error = "";
        return view('msmeregis', compact("error"));
    }

    public function indexApplicant(){
        $error = "";
        return view('applicantregis', compact("error"));
    }

    public function signUpMSME(Request $request)
    {
        
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|regex:/(08)[0-9]{10}/',
            'address' => 'required|string',

        ]);

        $username = $request->username;
        $password = $request->password;
        $email = $request->email;

        $errors = new MessageBag();
        $isError = false;
        // Check username
        $user = User::where('username', $username)->first();
        if (!is_null($user)) {
            $isError = true;
            $errors->add('username', 'Username has been taken');        
        }

        // Check email
        $user = User::where('email', $email)->first();
        if (!is_null($user)) {
            $isError = true;
            $errors->add('username', 'Email has been taken');     
        }

        if($isError)
            return back()->withErrors($errors);


        $new_user = new User();

        $new_user->username = $request->username;
        $new_user->password = $request->password;
        $new_user->email = $request->email;
        $new_user->phone = $request->phone;

        $new_user->save();

        $user = User::where('username', $username)->where('password', $password)->first();
        $user_id = $user->userID;

        $new_msme = new MSME();
        $new_msme->userID = $user_id;
        $new_msme->msmeName = $request->name;
        $new_msme->msmeAddress = $request->address;

        $new_msme->save();

        return redirect('login')->with('alert', 'Your Enterprise account successfully created!');
    }

    public function signUpApplicant(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|regex:/(08)[0-9]{10}/',
            'address' => 'required|string',
            'dob' => 'required|date_format:Y-m-d|before:today|nullable'
        ]);

        $username = $request->username;
        $password = $request->password;
        $email = $request->email;

        $errors = new MessageBag();
        $isError = false;
        // Check username
        $user = User::where('username', $username)->first();
        if (!is_null($user)) {
            $isError = true;
            $errors->add('username', 'Username has been taken');        
        }

        // Check email
        $user = User::where('email', $email)->first();
        if (!is_null($user)) {
            $isError = true;
            $errors->add('username', 'Email has been taken');     
        }

        if($isError)
            return back()->withErrors($errors);

        $new_user = new User();

        $new_user->username = $request->username;
        $new_user->password = $request->password;
        $new_user->email = $request->email;
        $new_user->phone = $request->phone;

        $new_user->save();

        $user = User::where('username', $username)->where('password', $password)->first();
        $user_id = $user->userID;

        $new_applicant = new Applicant();
        $new_applicant->userID = $user_id;
        $new_applicant->applicantName = $request->name;
        $new_applicant->applicantAddress = $request->address;
        $new_applicant->applicantDOB = $request->dob;
        $new_applicant->CV = null;
        $new_applicant->portofolioLink = null;
        
        $new_applicant->save();


        return redirect('login')->with('alert', 'Your Account successfully created!');
    }
}
