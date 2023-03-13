@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">

    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                Applicant List
            </div>
        </div>
        <hr>
        <div class="container mt-4">
            @if (count($proposals) == 0)
            <div class="lead text-center">There is no applicant yet</div>
            @else
            @foreach ($proposals as $proposal)
            <div class="d-flex bg-light card-body mt-2">
                <div class="card-left">
                    <h3>{{$proposal->JobVacancy()->first()->Job()->first()->jobName}}</h3>
                    <h6>Duration: {{$proposal->JobVacancy()->first()->duration}}</h3>
                        <p>{{$proposal->JobVacancy()->first()->description}}</p>
                        <div><small>Created on {{$proposal->JobVacancy()->first()->created_at}}</small></div>
                        <div><small>Proposed on {{$proposal->created_at}} by <a target="_blank" href="/profile/view/applicant/{{$proposal->User()->first()->userID}}">{{$proposal->User()->first()->username}}</a></small></div>
                    <div><strong>Status: {{$proposal->isHired == false ? 'Pending' : 'Hired'}}</strong></div>
                </div>

                @if($proposal->isHired == false)
                <div class="card-right float-right d-flex">
                    <form method="GET" action="{{'/jobvacancy/hire/'. $proposal->proposalID }}">
                        @csrf
                        <button class="mx-2 btn btn-info">Hire</button>
                    </form>

                    <form method="GET" action="{{ '/jobvacancy/reject/'. $proposal->proposalID }}">
                        @method('delete')
                        @csrf
                        <button class="mx-2 btn btn-danger">Cancel</button>
                    </form>
                </div>
                @endif
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