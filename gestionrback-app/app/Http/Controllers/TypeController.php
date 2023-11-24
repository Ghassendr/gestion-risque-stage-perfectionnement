<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\type;


class TypeController extends Controller
{
    public function index()
        { 
    
    
            $types = type::orderBy('name','ASC')->get();
    


            return response()->json($types);
        }  
    
    
public function ajout (Request $request)
{
    $types = new type([

        'name' => $request->input('name'),
        'description' => $request->input('description')
    ]);
    $types->save();
    return response()->json('type created!');
}
}
