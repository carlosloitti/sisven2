<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pay_Mode;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pays = DB::table('pay_mode') 
        ->select('pay_mode.*')
        ->get();
    
        return json_encode(['pays' => $pays]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pay = new Pay_Mode ();
        $pay->name = $request->name;
        $pay->observation= $request->observation; 

        $pay->save();        
    
        return json_encode(['pay' => $pay]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pay = Pay_Mode::find($id);

        return json_encode(['pay'  => $pay ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pay = Pay_Mode::find($id);
        $pay->name = $request->name;
        $pay->observation= $request->observation; 

        $pay->save();        
    
        return json_encode(['pay' => $pay]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pay = Pay_Mode::find($id);
        $pay->delete();

        $pays = DB::table('pay_mode') 
        ->select('pay_mode.*')
        ->get();
    
        return json_encode(['pays' => $pays, 'success' => true]);
    }
}
