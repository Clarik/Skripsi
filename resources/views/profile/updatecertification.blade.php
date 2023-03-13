@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">
    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                Update Certification
            </div>
        </div>
        <hr>
        <div class="container mt-4">
            <form role="form" action="/profile/certification/update/{{$cert->certificationID}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group p-3 tcolor">
                    <label for="name">Certification Name</label>
                    <input class="form-control mt-1" type="text" name="name" id="name" placeholder="" value="{{$cert->certificationName}}">
                </div>

                <div class="form-group p-3 tcolor">
                    <label for="provider">Certification Provider</label>
                    <input class="form-control mt-1" type="text" name="provider" id="provider" placeholder="" value="{{$cert->provider}}">
                </div>

                <div class="form-group p-3 tcolor">
                    <label for="description">Description</label>
                    <textarea class="form-control my-1" type="text" name="description" id="description" rows="2" placeholder="Description">{{$cert->description}}</textarea>
                    <label for="description" class="fw-light text-muted">Write the description about the certificate</label>
                </div>

                <div class="form-group p-3 tcolor">
                    <label for="link">Certification Link</label>
                    <input class="form-control mt-1" type="text" name="link" id="link" placeholder="" value="{{$cert->certificationLink}}">
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <div class="d-grid gap-2 p-3">
                        <a href="/profile/certification">
                            <button class="btn bg-white text-darkme-3" type="button">
                                Cancel
                            </button>
                        </a>
                    </div>
                    <div class="d-grid gap-2 p-3">
                        <button class="btn btn-info px-4 text-white" type="submit">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
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