@extends('layouts.app')
@section('content')
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bolder">Stunt Detector</h1>
        <p class="lead fw-normal text-muted mb-0">Update User</p>
        <div class="row">
            <div class="col-md-5 m-auto">
                <form method="post" class="mt-4" action="/iot/smart-bed/{{$user->id}}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dateOfBirth">Date of Birth</label>
                        <input type="date" id="dateOfBirth" value="{{$user->date_of_birth}}" name="dateOfBirth" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mt-2"><i class="bi bi-check"></i> Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
