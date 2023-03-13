<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Certification;
use App\Models\MSME;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = session()->get('user');
        $msme = MSME::where('userID', $user->userID)->first();
        if($msme === null) {
            $applicant = Applicant::where('userID', $user->userID)->first();
            return view('profile/applicant', compact('user', 'applicant'));
        }
        else {
            return view('profile/msme', compact('user', 'msme'));
        }
    }

    public function updateapplicant(Request $request)
    {
        $user = session()->get('user');
        
        $applicant = $user->Applicant()->first();
        $applicant->CV = $request->cv;
        $applicant->portofolioLink = $request->link;
        $applicant->save();

        return redirect('profile')->with('alert', 'Profile updated');
    }

    public function updatemsme(Request $request)
    {
        $user = session()->get('user');
        
        $msme = $user->MSME()->first();
        $msme->msmeName = $request->msmename;
        $msme->msmeAddress = $request->msmeaddress;
        $msme->save();

        return redirect('profile')->with('alert', 'Profile updated');
    }

    public function managecertification()
    {
        $user = session()->get('user');
        $certifications = Certification::where('userID', $user->userID)->paginate(5);
        return view('profile/certification')->with('certifications', $certifications);;
    }

    public function insertcertification()
    {
        return view('profile/insertcertification');
    }

    public function savecertification(Request $request)
    {
        $user = session()->get('user');
        $cert = new Certification();
        $cert->userID = $user->userID;
        $cert->certificationName = $request->name;
        $cert->provider = $request->provider;
        $cert->description = $request->description;
        $cert->certificationLink = $request->link;
        $cert->datePublished = Carbon::now();
        $cert->save();

        return redirect('/profile/certification')->with('alert', 'Certificate successfully inserted');
    }

    public function updatecertification($id)
    {
        $cert = Certification::where('certificationID',$id)->first();
        return view('/profile/updatecertification', compact('cert'));
    }

    public function saveupdatecertification(Request $request, $id)
    {
        $cert = Certification::find($id);
        $cert->certificationName = $request->name;
        $cert->provider = $request->provider;
        $cert->description = $request->description;
        $cert->certificationLink = $request->link;
        $cert->save();

        return redirect('/profile/certification')->with('alert', 'Certificate successfully updated');
    }

    public function deletecertification($id)
    {
        $cert = Certification::find($id);
        $cert->delete();
        return redirect('/profile/certification')->with('alert', 'Certificate successfully deleted');
    }

    public function viewprofilemsme($id)
    {
        $user = User::find($id);
        if($user == null ) {
            return back();
        }
        if($user->MSME()->first() == null) {
            return back();
        }
        return view('profile/viewmsme', compact('user'));
    }

    public function viewprofileapplicant($id)
    {
        $user = User::find($id);
        if($user == null) {
            return back();
        }
        if($user->Applicant()->first() == null) {
            return back();
        }
        return view('profile/viewapplicant', compact('user'));
    }

    public function viewcertification($id)
    {
        $user = User::find($id);

        if($user == null) {
            return back();
        }
        if($user->Applicant()->first() == null) {
            return back();
        }

        $certifications = Certification::where('userID', $user->userID)->paginate(5);
        return view('profile/viewcertification', compact('user'))->with('certifications', $certifications);
    }
}
