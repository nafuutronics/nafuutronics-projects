@extends('layouts.app')
@section('content')
<style>
    .btn-block {
        width: 100% !important;
    }

    .table {
        font-size: 12px !important;
    }

    @media(max-width: 760px) {
        .mtm-3 {
            margin-top: 20px !important;
        }
    }
</style>
<div class="container px-4 my-4">
    <div class="text-center mb-5">
        <h1 class="fw-bolder">Smart Meter(s)</h1>
        <p class="lead fw-normal text-muted mb-0">Project Hosted on {{ config('app.name') }}</p>
    </div>
    <h5 class="text-center">Real-time Data as of {{ $smartMeterData ? $smartMeterData->created_at : "N/A" }}</h5>

    <div class="col-md-5 m-auto mb-3">
        <div class="row mb-2">
            <div class="col-md-4 mb-2">
                <a href="?" class="btn btn-primary btn-block btn-sm">Refresh</a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="/iot/smart-meter/seed" class="btn btn-primary btn-block btn-info btn-sm">Generate Fake Data</a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="/iot/smart-meter/delete-tariff" class="btn btn-danger btn-block btn-sm">Clear Data</a>
            </div>
        </div>

        <a href="/iot/smart-meter/update-tariff" class="btn btn-warning btn-block btn-sm float-right">Change Tariff to {{ !$tariff ? "High" : "Low" }}</a>
        <br>
        <p class="text-center p-3">Tariff Status (DEMO Server): <b>{{ $tariff ? "High" : "Low" }}</b></p>
    </div>



    <div class="row">
        <div class="col-md-12 mb-3 alert-info">
            {{--
                ROOM 1 + 2:
                        TOTAL DATA
                        TABLE OF DATA COLLECTION
                        GRAPHS
            --}}
            <table class="mt-3 table bg-white table-responsive table-hover">
                <tr>
                    <th colspan="2" class="text-center">Total Energy Usage all Room(s)</th>
                </tr>
                <tr>
                    <th>Energy</th>
                    <td> {{ count($smartMeter) > 0 ? ($smartMeter[0]->energy + $smartMeter[1]->energy) : "0" }} Wh </td>
                </tr>
                <tr>
                    <th>Voltage</th>
                    <td> {{ count($smartMeter) > 0 ? ($smartMeter[0]->voltage + $smartMeter[1]->voltage) : "0" }} V </td>
                </tr>
                <tr>
                    <th>Current</th>
                    <td>{{ count($smartMeter) > 0 ? ($smartMeter[0]->current + $smartMeter[1]->current) : "0" }} A</td>
                </tr>
            </table>
            <p></p>
        </div>

        <div class="col-md-6 alert-success">

            {{--
                ROOM 1:
                        TOTAL DATA
                        TABLE OF DATA COLLECTION
                        GRAPHS
            --}}

            <table class="mt-3 table bg-white table-responsive table-hover">
                <tr>
                    <th colspan="2" class="text-center">Total Energy Usage for Room {{ count($smartMeter) > 0 ? $smartMeter[0]->smart_meter_room_id : "N/A" }}</th>
                </tr>
                <tr>
                    <th>Energy</th>
                    <td> {{ count($smartMeter) > 0 ? $smartMeter[0]->energy : "0" }} Wh </td>
                </tr>
                <tr>
                    <th>Voltage</th>
                    <td> {{ count($smartMeter) > 0 ? $smartMeter[0]->voltage : "0" }} V </td>
                </tr>
                <tr>
                    <th>Current</th>
                    <td>{{ count($smartMeter) > 0 ? $smartMeter[0]->current : "0" }} A</td>
                </tr>
            </table>

            <div class="mt-5 table-responsive">
                <h5 class="text-center">Data Collection (Room 1)</h5>
                <table class="table bg-white table-hover table-bordered">
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
        </div>

        <div class="col-md-6 mtm-3 alert-warning">

            {{--
                ROOM 2:
                        TOTAL DATA
                        TABLE OF DATA COLLECTION
                        GRAPHS
            --}}
            <table class="mt-3 table bg-white table-responsive table-hover">
                <tr>
                    <th colspan="2" class="text-center">Total Energy Usage for Room {{ count($smartMeter) > 0 ? $smartMeter[1]->smart_meter_room_id : "N/A" }}</th>
                </tr>
                <tr>
                    <th>Energy</th>
                    <td> {{ count($smartMeter) > 0 ? $smartMeter[1]->energy : "0" }} Wh </td>
                </tr>
                <tr>
                    <th>Voltage</th>
                    <td> {{ count($smartMeter) > 0 ? $smartMeter[1]->voltage : "0" }} V </td>
                </tr>
                <tr>
                    <th>Current</th>
                    <td>{{ count($smartMeter) > 0 ? $smartMeter[1]->current : "0" }} A</td>
                </tr>
            </table>

            <div class="mt-5 table-responsive">
                <h5 class="text-center">Data Collection (Room 2)</h5>
                <table class="table bg-white table-hover table-bordered">

                    <tr>
                        <th>Energy</th>
                        <th>Voltage</th>
                        <th>Current</th>
                        <th>Uploaded At</th>
                    </tr>
                    @foreach($smartMeter2 as $data)
                    <tr>
                        <td>{{$data->energy . ' Wh'}}</td>
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
    </div>

</div>
@endsection
