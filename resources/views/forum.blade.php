@extends('master.master')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">
        <a href="/createThread" style="position: fixed; top: 85%; right: 10%">
            <i class="bi bi-plus-circle-fill text-primary display-2"></i>
        </a>
        <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
            <div class="container py-3">
                <div class="display-3 me-2">
                    Forums
                </div>
            </div>
            <hr>
            <div class="w-100">
                @if (count($threads) == 0)
                    <div class="text-left lead w-100">There are no threads that can be showed right now</div>
                @else
                <div class="d-flex flex-column " style="width: 100%">
                    @foreach ($threads as $thread)
                        <div class="card mb-3 w-100" style="border-radius:20px">
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
                @endif
            </div>
            <div class="pagination d-flex justify-content-end align-items-center">
                {{$threads->withQueryString()->links()}}
            </div>
        </div>
    </div>
@endsection