<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobVacancy;
use App\Models\MSME;
use App\Models\Proposal;
use App\Models\Thread;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if(!session()->has('user')){
            return redirect('login');
        }

        $threadList = Thread::orderBy('created_at','DESC')->take(2)->get();

        $applicantList = null;
        $applied = null;
        
        $user = session()->get('user');
        $msme = MSME::where('userID', $user->userID)->first();
        if($msme === null) {
            $applied = Proposal::orderBy('created_at','DESC')->where('userID', $user->userID)
                ->take(2)->get();
        }
        else {
            $vacancies = JobVacancy::where('msmeID', $msme->msmeID)->get();
            $jobVacancyID = array();
            foreach ($vacancies as $vacancy) {
                array_push($jobVacancyID, $vacancy->jobVacancyID);
            }
    
            $applicantList = Proposal::orderBy('created_at','DESC')->whereIn('jobVacancyID', $jobVacancyID)
                                ->take(2)->get();
        }

        return view('home')->with('threads', $threadList)
                ->with('applicants', $applicantList)
                ->with('applied', $applied);
    }
}