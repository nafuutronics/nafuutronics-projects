@extends('layouts.app')
@section('content')
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bolder">Smart Meter(s)</h1>
        <p class="lead fw-normal text-muted mb-0">Project Hosted on {{ config('app.name') }}</p>
    </div>
    <h5 class="text-center">Real-time Data as of {{ $smartMeterData->created_at }}</h5>

    <div class="col-md-3 m-auto">
        <a href="?" class="btn btn-primary btn-sm m-1">Refresh</a>
        <a href="/iot/smart-meter/update-tariff" class="btn btn-warning btn-block btn-sm m-1 float-right">Change tariff to {{ !$tariff ? "high" : "low" }}</a>
    </div>

    <table class="table table-responsive table-hover">
        <tr>
            <th colspan="2" class="text-center">Total Energy Usage</th>
        </tr>
        <tr>
            <th>Tariff Status (DEMO Server)</th>
            <td> {{ $tariff ? "High" : "Low" }} </td>
        </tr>
        <tr>
            <th>Energy</th>
            <td> {{ $smartMeter->energy }} Wh </td>
        </tr>
        <tr>
            <th>Voltage</th>
            <td> {{ $smartMeter->voltage }} V </td>
        </tr>
        <tr>
            <th>Current</th>
            <td>{{ $smartMeter->current }} A</td>
        </tr>
    </table>
    <div class="mt-5 table-responsive">
        <h5 class="text-center">Data Collection (Room 1)</h5>
        <table class="table table-hover table-bordered">

            <tr>
                <th>Energy</th>
                <th>Voltage</th>
                <th>Current</th>
                <th>Uploaded At</th>
            </tr>
            @foreach($smartMeter1 as $data)
            <tr>
                <td>{{$data->energy . ' Wh'}}</td>
                <td>{!!$data->voltage . ' V'!!}</td>
                <td>{!!$data->current . ' A'!!}</td>
                <td>{{$data->created_at ? $data->created_at : '-'}}</td>
            </tr>
            @endforeach
        </table>
        {{ $smartMeter1->links() }}
    </div>

    <div class="mt-5">
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description text-center">
                This chart shows energy usage collected on smart meter device(s).
            </p>
        </figure>
    </div>

    <div class="mt-5 table-responsive">
        <h5 class="text-center">Data Collection (Room 2)</h5>
        <table class="table table-hover table-bordered">

            <tr>
                <th>Energy</th>
                <th>Voltage</th>
                <th>Current</th>
                <th>Uploaded At</th>
            </tr>
            @foreach($smartMeter2 as $data)
            <tr>
                <td>{{$data->energy}}</td>
                <td>{!!$data->voltage . ' V'!!}</td>
                <td>{!!$data->current . ' A'!!}</td>
                <td>{{$data->created_at ? $data->created_at : '-'}}</td>
            </tr>
            @endforeach
        </table>
        {{ $smartMeter2->links() }}
    </div>

    <div class="mt-5">
        <figure class="highcharts-figure">
            <div id="container2"></div>
            <p class="highcharts-description text-center">
                This chart shows energy usage collected on smart meter device(s).
            </p>
        </figure>
    </div>
</div>
@endsection
