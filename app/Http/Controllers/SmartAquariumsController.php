<?php

namespace App\Http\Controllers;

use App\Models\SmartAquarium;
use Illuminate\Http\Request;

class SmartAquariumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('temperature')) {
            $smartAquarium = new SmartAquarium;
            $smartAquarium->temperature = $request->get('temperature');
            $smartAquarium->depth = $request->get('depth');
            $smartAquarium->ph = $request->get('ph');
            $smartAquarium->food_cycle = $request->get('food');
            $smartAquarium->save();
            return "200";
        }
        $smartAquarium = SmartAquarium::orderBy('id', 'desc')->first();
        $lastUploadedDate = explode(' ', $smartAquarium->created_at)[0];
        $totalFood = SmartAquarium::where('created_at', 'like', '%' . $lastUploadedDate . '%')->sum('food_cycle');
        $smartAquariumData = SmartAquarium::orderBy('id', 'desc')->limit(50)->paginate(10);
        $status = [
            1,
            'Normal'
        ];
        if ($smartAquarium->ph > 9 || $smartAquarium->ph < 6)
            $status = [
                0,
                'PH reading is not normal, cleaning process initiated ...'
            ];
        if ($smartAquarium->depth > 20)
            $status = [
                0,
                'Depth too high reducing water level ...'
            ];
        if ($smartAquarium->temperature > 33)
            $status = [
                0,
                'Temperature too high cooling water ...'
            ];
        return view('smart-aquarium.index', compact('smartAquarium', 'status', 'smartAquariumData', 'totalFood'));
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
