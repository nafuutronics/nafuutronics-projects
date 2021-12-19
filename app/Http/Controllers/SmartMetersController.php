<?php

namespace App\Http\Controllers;

use App\Models\SmartMeter;
use App\Models\SmartMeterTariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmartMetersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('room')) {
            $smartMeter = new SmartMeter;
            $smartMeter->smart_meter_room_id = $request->get('room');
            $smartMeter->energy = $request->get('energy');
            $smartMeter->voltage = $request->get('voltage');
            $smartMeter->current = $request->get('current');
            $smartMeter->save();
            return "OK";
        }

        $smartMeter = DB::table('smart_meters')
            ->selectRaw('
                sum(energy) as energy,
                sum(voltage) as voltage,
                sum(current) as current
            ')
            // ->groupBy('smart_meter_room_id')
            ->first();
        $smartMeter1 = SmartMeter::where('smart_meter_room_id', 1)->orderBy('id', 'desc')->limit(50)->paginate(10);
        $smartMeter2 = SmartMeter::where('smart_meter_room_id', 2)->orderBy('id', 'desc')->limit(50)->paginate(10);
        $smartMeterData = SmartMeter::orderBy('id', 'desc')->first();
        $tariff = $this->getTariff();
        return view('iot.smart-meter.index',
            compact(
                'smartMeter1',
                'smartMeter2',
                'smartMeter',
                'smartMeterData',
                'tariff'
            ));
    }

    public function updateTariff()
    {
        if (SmartMeterTariff::exists()) {
            $tariffData = SmartMeterTariff::where('id', '!=', 0)->first()->is_high;
        } else {
            $tariff = new SmartMeterTariff;
            $tariff->is_high = true;
            $tariff->save();
            // ---
            $tariffData = 1;
        }

        $tariff = SmartMeterTariff::first();
        $tariff->is_high = !$tariffData;
        $tariff->save();

        return redirect()->route('smart-meter.index');
    }

    public function getTariff()
    {
        if (SmartMeterTariff::exists()) {
            return SmartMeterTariff::where('id', '!=', 0)->first()->is_high;
        } else {
            $tariff = new SmartMeterTariff;
            $tariff->is_high = true;
            $tariff->save();
        }
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
