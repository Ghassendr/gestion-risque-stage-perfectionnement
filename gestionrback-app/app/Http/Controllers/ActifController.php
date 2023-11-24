<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Actif;
class ActifController extends Controller
{
 public function index()
    { 
        

        //  $actifs= Actif::where('selectionnee', '=', 'oui')->get();

        $actifs = Actif::all();

        return response()->json($actifs);
    }  
    public function index2()
    { 
        

        $actifs= Actif::where('selectionnee', '=', 'oui')->get();
        // $company = company::all()->distinct('name')->get();
       // $actifs = Actif::all();

        return response()->json($actifs);
    }  

public function store(Request $request)
{
    $actifs = new Actif([
        'description' => $request->input('description'),
        'proprietaire' => $request->input('proprietaire'),
        'type' => $request->input('type'),
        'processuse' => $request->input('processuse'),
        'c' => $request->input('c'),
        'i' => $request->input('i'),
        'd' => $request->input('d'),
        'selectionnee' => $request->input('selectionnee'),
        'commantaire' => $request->input('commantaire'),
       
    ]);
    $actifs->save();
    return response()->json('actif created!');
}
public function show($id)
{
     $act= Actif::find($id);
     return response()->json($act);
 }

public function update(Request $request, $id)
{
   $actifs = Actif::find($id);
   $actifs->update($request->all());
   return response()->json('actif updated');
}
public function destroy($id)
{
    $actifs = Actif::find($id);
    $actifs->delete();
    return response()->json(' deleted!');
}
}
