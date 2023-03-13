@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">

    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                Applied Job Vacancy
            </div>
        </div>
        <hr>
        <div class="container mt-4">
            @if (count($proposals) == 0)
            <div class="lead text-center">You didn't apply to any job vacancy yet</div>
            @else
            @foreach ($proposals as $proposal)
            <div class="d-flex bg-light card-body mt-2">
                <div class="card-left">
                    <h3>{{$proposal->JobVacancy()->first()->Job()->first()->jobName}}</h3>
                    <h6>Duration: {{$proposal->JobVacancy()->first()->duration}}</h3>
                        <p>{{$proposal->JobVacancy()->first()->description}}</p>
                        <div><small>Created on {{$proposal->JobVacancy()->first()->created_at}} by {{$proposal->JobVacancy()->first()->MSME()->first()->msmeName}}</small></div>
                        <div><small>Proposed on {{$proposal->created_at}}</small></div>
                    <div><strong>Status: {{$proposal->isHired == false ? 'Pending' : 'Hired'}}</strong></div>
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

</style>

@endsection