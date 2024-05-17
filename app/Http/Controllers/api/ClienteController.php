<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Clientes;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = DB::table('customers') 
        ->select('customers.*')
        ->get();
    
        return json_encode(['clientes' => $clientes]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new Clientes ();
        $cliente->document_number = $request->document_number;
        $cliente->first_name= $request->first_name;
        $cliente->last_name  = $request->last_name; 
        $cliente->address = $request->address;
        $cliente->birthday = $request->birthday;
        $cliente->phone_number = $request->phone_number;
        $cliente->email = $request->email;

        $cliente->save();        
    
        return json_encode(['cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Clientes::find($id);

        return json_encode(['cliente'  => $cliente ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Clientes::find($id);
        $cliente->document_number = $request->document_number;
        $cliente->first_name= $request->first_name;
        $cliente->last_name  = $request->last_name; 
        $cliente->address = $request->address;
        $cliente->birthday = $request->birthday;
        $cliente->phone_number = $request->phone_number;
        $cliente->email = $request->email;

        $cliente->save();  
    
        return json_encode(['cliente' => $cliente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Clientes::find($id);
        $cliente->delete();

        $clientes = DB::table('customers') 
        ->select('customers.*')
        ->get();
    
        return json_encode(['clientes' => $clientes, 'success' => true]);
    }
}
