@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">

    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                Available Job Vacancies
            </div>
        </div>
        <hr>
        <div class="container mt-4">
            @if (count($vacancies) == 0)
            <div class="lead text-center">No Available Job Vacancies</div>
            @else
            @foreach ($vacancies as $vacancy)
            <div class="d-flex bg-light card-body mt-2">
                <div class="card-left">
                    <h3>{{$vacancy->job()->first()->jobName}}</h3>
                    <h6>Duration: {{$vacancy->duration}}</h3>
                        <p>{{$vacancy->description}}</p>
                        <small>Created on {{$vacancy->created_at}} by <a target="_blank" href="/profile/view/msme/{{$vacancy->MSME()->first()->userID}}">{{$vacancy->msme()->first()->msmeName}}</a></small>
                </div>

                <div class="card-right float-right d-flex">
                    <form method="GET" action="{{'/jobvacancy/apply/'. $vacancy->jobVacancyID }}">
                        @csrf
                        <button class="mx-2 btn btn-info">Apply</button>
                    </form>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

<style>
    .card-left {
        width: 100%;
        float: left;
    }

    .card-right {
        margin: auto;
        height: 10%;
    }

    #floatingRightBottom {
        position: absolute;
        left: 0;
        right: 0;
        margin-top: 80vh;
        margin-left: 95vw;
        z-index: 10;
        color: #5046e1;
    }
</style>

@endsection