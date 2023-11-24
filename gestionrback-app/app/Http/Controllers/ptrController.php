<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ptr;
class ptrController extends Controller
{
    
    public function index()
    { 
               $ptrs = ptr::all();
        return response()->json($ptrs);
    }  

    public function store3(Request $request)
    {
        $ptrs = new ptr([
            'name' => $request->input('name'),
            'traitement' => $request->input('traitement'),
            'mesureiso' => $request->input('mesureiso'),
            'action' => $request->input('action'),
            'responsable' => $request->input('responsable'),
            'etat' => $request->input('etat'),
            'efficacite' => $request->input('efficacite'),
            'commentaire' => $request->input('commentaire'),
            'impact' => $request->input('impact'),
            'faclite' => $request->input('faclite'),
            'vraisemblance' => $request->input('vraisemblance'),
            'criticiter' => $request->input('criticiter'),
            'niveaucriticiter' =>  $request->input('niveaucriticiter'),
    
        ]);
        $ptrs->save();
        return response()->json('ptr created!');
    }
    public function destroy($id)
{
    $ptrs = ptr::find($id);
    $ptrs->delete();
    return response()->json(' deleted!');
}

}
