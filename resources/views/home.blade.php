@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">
    @php
    $user = session('user');
    @endphp
    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                Welcome,
                <strong class="text-secondary">{{$user->username}}</strong>
                !
            </div>

        </div>
        <div class="container my-4">
            <div class="h2">Recent Forums</div>
            <hr>
            @if (count($threads) > 0)
            <div class="card-group">
                @foreach ($threads as $thread)
                <div class="card m-3" style="width: 18rem; border-radius:20px">
                    <div class="card-body">
                        <h5 class="card-title">{{$thread->threadTitle}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">by: {{$thread->user->username}}</h6>
                        <div>{{mb_strimwidth($thread->threadContent, 0, 20, "...");}}</div>
                        <p class="card-text"><small>Created on {{date("F d, Y", strtotime($thread->created_at))}}</small></p>
                        <a href="/forum/{{$thread->threadID}}" class="card-link">View more</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end">
                <a href="/forum" class="text-right">See all >></a>
            </div>
            @else
            <div class="lead text-center">No Forums Available</div>
            @endif

            @if($user->MSME()->first() == null)
            <div class="h2">Recent Applied Job Vacancies</div>
            <hr>
            @if (count($applied) == 0)
            <div class="lead text-center">You didn't apply to any job vacancy yet</div>
            @else
            @foreach ($applied as $proposal)
            <div class="d-flex bg-light card-body mt-2">
                <div class="card-left">
                    <h3>{{$proposal->JobVacancy()->first()->Job()->first()->jobName}}</h3>
                    <h6>Duration: {{$proposal->JobVacancy()->first()->duration}}</h3>
                        <p>{{$proposal->JobVacancy()->first()->description}}</p>
                        <div><small>Created on {{date("F d, Y H:i", strtotime($proposal->JobVacancy()->first()->created_at))}} by <a target="_blank" href="/profile/view/msme/{{$proposal->JobVacancy()->first()->MSME()->first()->userID}}">{{$proposal->JobVacancy()->first()->MSME()->first()->msmeName}}</a></small></div>
                        <div><small>Proposed on {{date("F d, Y H:i", strtotime($proposal->created_at))}}</small></div>
                        <div><strong>Status: {{$proposal->isHired == false ? 'Pending' : 'Hired'}}</strong></div>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-end">
                <a href="/jobvacancy/applied" class="text-right">See all >></a>
            </div>
            @endif
            @else
            <div class="h2">Recent Applicant</div>
            <hr>
            @if (count($applicants) == 0)
            <div class="lead text-center">There is no applicant yet</div>
            @else
            @foreach ($applicants as $proposal)
            <div class="d-flex bg-light card-body mt-2">
                <div class="card-left">
                    <h3>{{$proposal->JobVacancy()->first()->Job()->first()->jobName}}</h3>
                    <h6>Duration: {{$proposal->JobVacancy()->first()->duration}}</h3>
                        <p>{{$proposal->JobVacancy()->first()->description}}</p>
                        <div><small>Created on {{date("F d, Y H:i", strtotime($proposal->JobVacancy()->first()->created_at))}}</small></div>
                        <div><small>Proposed on {{date("F d, Y H:i", strtotime($proposal->created_at))}} by <a target="_blank" href="/profile/view/applicant/{{$proposal->User()->first()->userID}}">{{$proposal->User()->first()->username}}</a></small></div>
                        <div><strong>Status: {{$proposal->isHired == false ? 'Pending' : 'Hired'}}</strong></div>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-end">
                <a href="/jobvacancy/applicantlist" class="text-right">See all >></a>
            </div>
            @endif
            @endif
        </div>

    </div>
</div>

@endsection