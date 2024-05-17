<?php

namespace App\Http\Controllers\api;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        $categories = DB::table('categories')
        ->orderBy('categories.name') 
        ->get();

    
    return json_encode(['categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'max:30', 'unique'],
            'category_id' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) { 
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);


    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Categorie::find($id);
        if (is_null($categories)) {
            return abort (404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
