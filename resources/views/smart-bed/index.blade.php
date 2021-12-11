@extends('layouts.app')
@section('content')
<?php
function dateDifference($date_1, $date_2, $differenceFormat = '%a')
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);
}
?>
<div class="container px-5 my-5">
    <div class="text-center">
        <h1 class="fw-bolder">Stunt Detector</h1>
        <p class="lead fw-normal text-muted mb-0">Project Hosted on {{ config('app.name') }}</p>
    </div>
    <p class="text-center mb-5">
        <a href="/iot/smart-bed/create" class="btn btn-link"><b>WHO</b> Child Growth Standards </a>
    </p>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
    @endif
    <table class="table table-responsive table-hover">
        @if (count($users) > 0)
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['firstName'] . ' ' . $user['lastName']}}</td>
            <td>{{$user['gender']}}</td>
            <td id="<?= $user['id'] ?>">
                <?php
                $months = dateDifference(date('Y-m-d'), $user['dateOfBirth'], '%m');
                ?>
                {{$months}} month(s)
            </td>
            <td>{{$user['lastHeight'] ?? null ? $user['lastHeight'] . 'cm' : 'N/A'}}</td>
            <td>{{$user['lastWeight'] ?? null ? $user['lastWeight'] . 'kg' : 'N/A'}}</td>
            <td>{{$user['lastStatus'] ?? null ? $user['lastStatus'] : 'N/A'}}</td>
            <td>
                <a href="/iot/smart-bed?pull_data=1&user_id={{ $user['id'] }}&months={{$months}}&gender={{$user['gender']}}" class="btn btn-success btn-sm"><i class="bi bi-download"></i> Pull H&W</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center">No users found, try adding at top right.</td>
        </tr>
        @endif
    </table>
</div>
@endsection
