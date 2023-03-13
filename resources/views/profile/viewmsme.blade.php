@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">
    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                {{$user->MSME()->first()->msmeName}}'s Profile
            </div>
        </div>
        <hr>
        <div class="container mt-4">

            <div class="form-group p-3">
                <label for="email">Email</label>
                <input class="form-control mt-1" type="text" name="email" id="email" value="{{$user->email}}" disabled>
            </div>

            <div class="form-group p-3">
                <label for="phone">Phone</label>
                <input class="form-control mt-1" type="text" name="phone" id="phone" value="{{$user->phone}}" disabled>
            </div>

            <div class="form-group p-3">
                <label for="msmeaddress">MSME Address</label>
                <input class="form-control mt-1" type="text" name="msmeaddress" id="msmeaddress" value="{{$user->MSME()->first()->msmeAddress}}" disabled>
            </div>

        </div>
    </div>
</div>
</div>

<style>

</style>

@endsection