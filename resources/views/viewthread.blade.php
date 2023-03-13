@extends('master.master')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">
        <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
            <div class="py-3">
                <div class="display-3 me-2 mb-3">
                    {{$thread->threadTitle}}
                </div>
                <div class="h4 ps-2">
                    By: {{$thread->user->username}}
                </div>
                <div class="lead text-muted ps-2">
                    Created on: {{date("F d, Y", strtotime($thread->created_at))}}
                </div>
            </div>
            <hr>
            <div class="w-100 mb-5">
                <div>
                    {{$thread->threadContent}}
                </div>
            </div>
            <div class="w-100 mb-3">
                <div class="display-4">Replies</div>
            </div>
            <hr>
            <div class="w-100 mb-5">
                @if (count($replies) == 0)
                    <div class="text-center lead w-100">There are no replies to this thread right now</div>
                @else
                <div class="d-flex flex-column " style="width: 100%">
                    @foreach ($replies as $reply)
                        <div class="card mb-3 w-100" style="border-radius:20px">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex flex-column align-items-center" style="width: 10%">
                                    <i class="text-muted bi bi-person-circle h2"></i>
                                    <div class="h6">{{$reply->user->username}}</div>
                                </div>
                                <div class="d-flex flex-column justify-content-between" style="width: 80%">
                                    <h5 class="lead">{{$reply->replyContent}}</h5>
                                    <hr>
                                    <h6 class="card-subtitle mb-2 text-muted">{{date("F d, Y H:i", strtotime($reply->created_at))}}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
            <form action="{{url()->current()}}" method="POST" class="d-flex flex-column align-items-center p-3 mb-3" style="border: 2px solid #F2F1EF; border-radius: 10px">
                @csrf
                <label for="" class="h6 mb-3 ps-2 text-left w-100">Reply to this thread</label>
                <textarea class="form-control mb-2" id="content" name="content" placeholder="Reply Content" style="border-radius: 20px"></textarea>
                <button class="btn btn-outline-primary mt-2" type="submit">Reply</button>
            </form>
        </div>
    </div>
@endsection