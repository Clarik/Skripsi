<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobVacancy;
use App\Models\MSME;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearchResults(Request $request){
        $query = $request->search;
        $msmes = MSME::where('msmeName', 'like', '%' . $query . '%')->get();
        $applicants = Applicant::where('applicantName', 'like', '%' . $query . '%')->get();

        return view('search')->with(['msmes' => $msmes])->with(['applicants' => $applicants]);
    }
}
