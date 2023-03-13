@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">
    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                New Thread
            </div>
        </div>
        <hr>
        <div class="container mt-4">
        <form class="" role="form" action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group p-3">
                <label for="username">Thread Title</label>
                <input class="form-control mt-1" type="text" name="title" id="title">
            </div>

            <div class="form-group p-3">
                <label for="email">Thread Content</label>
                <textarea class="form-control mt-1" name="content" id="content"></textarea>
            </div>

            <div class="form-group p-3">
                <button class="btn btn-secondary px-4 text-white" type="submit">Create Thread</button>
            </div>
        </div>
    </div>
</div>
</div>

<style>

</style>

@endsection