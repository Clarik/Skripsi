<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobVacancy;
use App\Models\MSME;
use App\Models\Proposal;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    public function index()
    {
        $user = session()->get('user');
        $msme = MSME::where('userID', $user->userID)->first();
        $vacancies = JobVacancy::where('msmeID', $msme->msmeID)->get();
        return view('jobvacancy/manage', compact('vacancies'));
    }

    public function applicantview()
    {
        $vacancies = JobVacancy::all();
        return view('jobvacancy/view', compact('vacancies'));
    }

    public function applicantapply($id)
    {
        $user = session()->get('user');

        $exists = Proposal::where('userID',$user->userID)->where('jobVacancyID', $id)->first();

        // Cek jika sudah apply
        if($exists !== null) {
            return back()->with('alert', 'You already applied to this job vacancy');
        }

        $proposal = new Proposal();
        $proposal->userID = $user->userID; 
        $proposal->jobVacancyID = $id;
        $proposal->isHired = false;

        $proposal->save();
        return back()->with('alert', 'You successfully applied to the job vacancy');
    }

    public function applicantproposal()
    {
        $user = session()->get('user');
        $proposals = Proposal::orderBy('created_at','DESC')->where('userID', $user->userID)->get();
        return view('jobvacancy/applied', compact('proposals'));
    }

    public function applicantlist()
    {
        $jobVacancyID = array();
        $user = session()->get('user');
        $msme = MSME::where('userID', $user->userID)->first();
        $vacancies = JobVacancy::where('msmeID', $msme->msmeID)->get();
        foreach ($vacancies as $vacancy) {
            array_push($jobVacancyID, $vacancy->jobVacancyID);
        }

        $proposals = Proposal::orderBy('created_at','DESC')->whereIn('jobVacancyID', $jobVacancyID)->get();
        return view('jobvacancy/applicantlist', compact('proposals'));
    }

    public function applicanthire($id)
    {
        $proposal = Proposal::find($id);
        $proposal->isHired = true;
        $proposal->save();
        return back()->with('alert', 'Successfully Hired');
    }

    public function applicantreject($id)
    {
        $proposal = Proposal::find($id);
        $proposal->delete();
        return back()->with('alert', 'Successfully Rejected');
    }

    public function create()
    {
        $jobs = Job::all();
        return view('jobvacancy/create', compact('jobs'));
    }

    public function save(Request $request)
    {
        $user = session()->get('user');
        $msme = MSME::where('userID', $user->userID)->first();

        request()->validate(
            [
                'duration' => 'required',
                'description' => 'required'
            ],
            [
                'duration.required' => 'Duration must not empty.',
                'description.required' => 'Description must not empty.',
            ]
        );


        $vacancy = new JobVacancy();
        $vacancy->msmeID = $msme->msmeID;
        $vacancy->jobID = $request->job;
        $vacancy->duration = $request->duration;
        $vacancy->description = $request->description;

        $vacancy->save();

        return redirect('/jobvacancy/manage')->with('alert', 'Job vacancy successfully created');
    }

    public function update($id)
    {
        $jobs = Job::all();
        $jobvacancy = JobVacancy::where('jobVacancyID',$id)->first();
        return view('/jobvacancy/update', compact('jobs','jobvacancy'));
    }

    public function saveupdate(Request $request, $id)
    {
        request()->validate(
            [
                'duration' => 'required',
                'description' => 'required'
            ],
            [
                'duration.required' => 'Duration must not empty.',
                'description.required' => 'Description must not empty.',
            ]
        );

        $vacancy =  JobVacancy::where('jobVacancyID',$id)->first();
        $vacancy->jobID = $request->job;
        $vacancy->duration = $request->duration;
        $vacancy->description = $request->description;
        $vacancy->save();

        return redirect('/jobvacancy/manage')->with('alert', 'Job vacancy sucessfully updated');
    }

    public function delete($id)
    {
        $vacancy =  JobVacancy::where('jobVacancyID',$id)->first();
        $vacancy->delete();
        return redirect('/jobvacancy/manage')->with('alert', 'Job vacancy deleted');
    }
}
