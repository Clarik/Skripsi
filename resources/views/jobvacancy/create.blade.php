@extends('master.master')

@section('content')
<div class="min-vh-100 d-flex justify-content-center" style="background-color: #F2F1EF">
    <div class="container my-5 px-5 py-3" style="background-color: white; border-radius: 20px;">
        <div class="container py-3">
            <div class="display-3 me-2">
                Insert Job Vacancy
            </div>
        </div>
        <hr>
        <div class="container mt-4">
            <form role="form" action="/jobvacancy/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group p-3">
                    <label for="job">Job</label>
                    <select class="form-control" id="job" name="job">
                        @foreach ($jobs as $job)
                        <option value="{{$job->jobID}}">{{$job->jobName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group p-3 tcolor">
                    <label for="duration">Job Duration</label>
                    <input class="form-control mt-1" type="text" name="duration" id="duration" placeholder="e.g. : 1 Months, 2 Week, etc.">
                </div>

                <div class="form-group p-3 tcolor">
                    <label for="description">Job Description</label>
                    <textarea class="form-control my-1" type="text" name="description" id="description" rows="2" placeholder="Description"></textarea>
                    <label for="description" class="fw-light text-muted">Write the description about the job vacancy</label>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <div class="d-grid gap-2 p-3">
                        <a href="/jobvacancy/manage">
                            <button class="btn bg-white text-darkme-3" type="button">
                                Cancel
                            </button>
                        </a>
                    </div>
                    <div class="d-grid gap-2 p-3">
                        <button class="btn btn-info px-4 text-white" type="submit">
                            Create
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