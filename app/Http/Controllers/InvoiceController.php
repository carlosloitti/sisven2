<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $invoices = DB::table('invoices')
            ->join('customers', 'invoices.customer_id', '=' , 'customers.id')
            ->join('pay_mode', 'invoices.pay_mode_id', '=' , 'pay_mode.id')
            ->select('invoices.*', "customers.last_name" , "pay_mode.name")
            ->get();
                  
        return view('invoice.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = DB::table('customers')->orderBy('last_name')->get();    
        $pay_modes = DB::table('pay_mode')->orderBy('name')->get();       
        
        
        
        
        return view('invoice.new', ['customers' => $customers, 'pay_mode' => $pay_modes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->number = $request->number;
        $invoice->customer_id= $request->code;
        $invoice->date  = $request->date; 
        $invoice->pay_mode_id = $request->code;
        $invoice->save();


        $invoices = DB::table('invoices')
        ->join('customers', 'invoices.customer_id', '=' , 'customers.id')
        ->join('pay_mode', 'invoices.pay_mode_id', '=' , 'pay_mode.id')
        ->select('invoices.*', "customers.last_name" , "pay_mode.name")
        ->get();
              
    return view('invoice.index', ['invoices' => $invoices]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::find($id);

        $customers = DB::table('customers')->orderBy('last_name')->get();
        $pay_modes = DB::table('pay_mode')->orderBy('name')->get(); 

        return view('invoice.edit' , ['invoice'  => $invoice, 'customers' => $customers, 'pay_mode' => $pay_modes ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice =  Invoice::find($id);
        $invoice->number = $request->number;
        $invoice->customer_id = $request->code;
        $invoice->date  = $request->date; 
        $invoice->pay_mode_id = $request->code;
        $invoice->save();

        $invoices = DB::table('invoices')
        ->join('customers', 'invoices.customer_id', '=' , 'customers.id')
        ->join('pay_mode', 'invoices.pay_mode_id', '=' , 'pay_mode.id')
        ->select('invoices.*', "customers.last_name" , "pay_mode.name")
        ->get();
              
    return view('invoice.index', ['invoices' => $invoices]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();

        $invoices = DB::table('invoices')
        ->join('customers', 'invoices.customer_id', '=' , 'customers.id')
        ->join('pay_mode', 'invoices.pay_mode_id', '=' , 'pay_mode.id')
        ->select('invoices.*', "customers.last_name" , "pay_mode.name")
        ->get();
              
    return view('invoice.index', ['invoices' => $invoices]);

    }
}
