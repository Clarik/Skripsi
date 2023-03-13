@extends('master.master')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">
        <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
            <div class="container py-3">
                <div class="display-3 me-2">
                    Search Results
                </div>
            </div>
            <div class="container mt-4">
                <div class="h2">MSME</div>
                <div class="dropdown-divider"></div>
                @if (count($msmes) == 0)
                    <div class="lead text-center">No Results Found</div>
                @else
                    @foreach ($msmes as $msme)
                        <div class="card m-3" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$msme->msmeName}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$msme->msmeAddress}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">{{$msme->user->phone}}</h6>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="container mt-4">
                <div class="h2">Applicant</div>
                <div class="dropdown-divider"></div>
                @if (count($applicants) == 0)
                    <div class="lead text-center">No Results Found</div>
                @else
                    @foreach ($applicants as $applicant)
                        <div class="card m-3" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$applicant->applicantName}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$applicant->applicantAddress}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">{{$applicant->user->phone}}</h6>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>  
    
@endsection