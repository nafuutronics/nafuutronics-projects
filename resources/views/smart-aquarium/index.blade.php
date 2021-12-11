@extends('layouts.app')
@section('content')
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bolder">Smart Aquarium</h1>
        <p class="lead fw-normal text-muted mb-0">Project Hosted on {{ config('app.name') }}</p>
    </div>
    <h5 class="text-center">Real-time Data as of {{ $smartAquarium['created_at'] }}</h5>
    <table class="table table-responsive table-hover">
        <tr>
            <th>PH</th>
            <td> {{ $smartAquarium['ph'] }} </td>
        </tr>
        <tr>
            <th>Temperature</th>
            <td> {{ $smartAquarium['temperature'] }}&deg;C </td>
        </tr>
        <tr>
            <th>Depth</th>
            <td>{{ $smartAquarium['depth'] }}cm<sup>3</sup></td>
        </tr>
        <tr>
            <th>Last Food Given</th>
            <td>{{ $smartAquarium['food_cycle'] }} grams</td>
        </tr>
        <tr>
            <th>Total Food Given</th>
            <td>{{ $totalFood }} grams</td>
        </tr>
        <tr class="@if($status[0] == 1) bg-success @else bg-danger @endif text-light">
            <th>Status</th>
            <td>{{ $status[1] }}</td>
        </tr>
    </table>
    <div class="mt-5 table-responsive">
        <h5 class="text-center">Data Collection</h5>
        <table class="table table-hover table-bordered">

            <tr>
                <th>PH</th>
                <th>Temperature</th>
                <th>Depth</th>
                <th>Food</th>
                <th>Uploaded At</th>
            </tr>
            @foreach($smartAquariumData as $data)
            <tr>
                <td>{{$data->ph}}</td>
                <td>{!!$data->temperature . '&deg;C'!!}</td>
                <td>{!!$data->depth . 'cm<sup>3</sup>'!!}</td>
                <td>{{$data->food_cycle . ' grams'}}</td>
                <td>{{$data->created_at ? $data->created_at : '-'}}</td>
            </tr>
            @endforeach
        </table>
        {{$smartAquariumData->links()}}
    </div>
    <div class="mt-5">
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description text-center">
                This chart shows data collected on smart aquarium device.
            </p>
        </figure>
    </div>
</div>
@endsection
