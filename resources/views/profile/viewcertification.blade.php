@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">

    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                {{$user->username}}'s Certification
            </div>
        </div>
        <hr>
        <div class="container mt-4">
        @if (count($certifications) == 0)
            <div class="lead text-center">This applicant doesn't have any certification yet</div>
            @else
            @foreach ($certifications as $cert)
            <div class="d-flex bg-light card-body mt-2">
                <div class="card-left">
                    <h3>{{$cert->certificationName}}</h3>
                    <h6>Provider: {{$cert->provider}}</h3>
                        <p>{{$cert->description}}</p>
                        <p>Link: <a href="{{$cert->certificationLink}}">{{$cert->certificationLink}}</a></p>
                        <small>Published on {{date("F d, Y H:i", strtotime($cert->created_at))}}</small>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="pagination d-flex justify-content-end align-items-center">
                {{$certifications->withQueryString()->links()}}
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