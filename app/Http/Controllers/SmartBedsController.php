<?php

namespace App\Http\Controllers;

use App\Models\SmartBed;
use App\Models\SmartBedUser;
use App\Models\StuntDataHeightAge;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmartBedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('height')) {
            $smartbed = SmartBed::find(1);
            $smartbed->height = $request->get('height');
            $smartbed->weight = $request->get('weight');
            $smartbed->save();
            return "200";
        }

        if ($request->get('pull_data')) {
            $smartbed = SmartBed::find(1);
            $user_id = $request->get('user_id');
            $months = $request->get('months');
            $gender = strtolower($request->get('gender'));
            $height = $smartbed->height;
            $weight = $smartbed->weight;

            $stuntDatabase = StuntDataHeightAge::where(['gender' => $gender, 'month' => $months])->first();
            $standardDeviation = $stuntDatabase->standard_deviation;
            $average = $stuntDatabase->average;

            $zIndex = ($height - $average) / $standardDeviation;
            $status = "Normal";
            if ($zIndex > -2)
                $status = "Normal";
            if ($zIndex < -2 && $zIndex > -3)
                $status = "Moderate";
            if ($zIndex < -3)
                $status = "Stunted";

            try {
                $sendData = Http::post('http://vmi515671.contaboserver.net:8081/clinic-data', [
                    'id' => $user_id,
                    'status' => $status,
                    'height' => $height,
                    'weight' => $weight,
                    'month' => $months
                ]);
            } catch (Exception $e) {
                $error = 'There was a problem updating data!';
                return redirect()->route('smart-bed.index')->with('error', $error);
            }

            if ($sendData->status() == 200) {
                $success = 'Data has been updated!';
                return redirect()->route('smart-bed.index')->with('success', $success);
            } else {
                $error = 'There was a problem updating data!';
                return redirect()->route('smart-bed.index')->with('error', $error);
            }
        }

        try {
            $users = Http::get('http://vmi515671.contaboserver.net:8081/children')['children'];
        } catch (Exception $e) {
            $users = [];
        }

        return view('smart-bed.index', compact('users'));
    }

    public function getData()
    {
        $smartbed = SmartBed::find(1);
        return response()->json([
            "height" => $smartbed->height,
            "weight" => $smartbed->weight
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Shows WHO studing data.
     *
     * @return \Illuminate\Http\Response
     */
    public function stuntingData()
    {
        $stuntingData = StuntDataHeightAge::all();
        return view('smart-bed.create', compact('stuntingData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new SmartBedUser;
        $user->name = $request->name;
        $user->date_of_birth = $request->dateOfBirth;
        $user->save();

        return redirect()->route('smart-bed.index');
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
        $user = SmartBedUser::find($id);
        return view('smart-bed.edit', compact('user'));
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
        $user = SmartBedUser::find($id);
        $user->name = $request->name;
        $user->date_of_birth = $request->dateOfBirth;
        $user->save();

        return redirect()->route('smart-bed.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SmartBedUser::destroy($id);
        return redirect()->route('smart-bed.index');
    }
}
