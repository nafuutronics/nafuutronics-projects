@extends('layouts.app')
@section('content')
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bolder mb-4">WHO Child Growth Standards</h1>
        <div class="row">
            <table class="table table-responsive table-hover table-bordered">

                @if (count($stuntingData) > 0)

                <?php
                $prevGender = 'male';
                $nextGender = 'female';
                ?>
                @foreach($stuntingData as $data)
                @if ($prevGender == 'male')
                <?php $prevGender = ''; ?>
                <tr class="bg-blue">
                    <th colspan="3">
                        Length-for-age for boys, age in years and months
                    </th>
                </tr>
                <tr>
                    <th>Age (Month)</th>
                    <th>Average Height (cm)</th>
                    <th>Standard Deviation (cm)</th>
                </tr>
                @endif

                @if ($nextGender == $data['gender'])
                <?php $nextGender = ''; ?>
                <tr class="bg-pink">
                    <th colspan="3">
                        Length-for-age for girls, age in years and months
                    </th>
                <tr>
                    <th>Age (Month)</th>
                    <th>Average Height (cm)</th>
                    <th>Standard Deviation (cm)</th>
                </tr>
                </tr>
                @endif
                <tr>
                    <td>
                        {{$data['month']}}
                        @if($data['month'] == 6)
                        <br /><b><i>0.5 year</i></b>
                        @elseif($data['month'] == 12)
                        <br /><b><i>1 year</i></b>
                        @elseif($data['month'] == 18)
                        <br /><b><i>1.5 years</i></b>
                        @elseif($data['month'] == 24)
                        <br /><b><i>2 years</i></b>
                        @endif
                    </td>
                    <td>{{$data['average']}}cm</td>
                    <td>{{$data['standard_deviation']}}cm</td>
                </tr>

                @endforeach
                @else
                <tr>
                    <td class="text-center">No stuntingData found, try adding at top right.</td>
                </tr>
                @endif
            </table>
        </div>

    </div>

</div>
@endsection
