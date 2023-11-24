<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risque;
class RisqueController extends Controller
{
    public function index()
    {
       $risques = Risque::orderBy('name')->get();
    return response()->json($risques);
    }  

    public function Cretique()
    {
       $risques = Risque::where('niveaucrit', '=', 'Risque Critique')->get();
    return response()->json($risques);
    }  


    public function show($id)
{
    $risque= Risque::find($id);
    return response()->json($risque);
}

public function ajouter (Request $request)
{
    $risques = new risque([
        'name' =>$request->input('name'),
        'cause' => $request->input('cause'),
        'menaces' => $request->input('menaces'),
        'proprietaire' => $request->input('proprietaire'),
        'type' => $request->input('type'),
        'mesuressec' => $request->input('mesuressec'),
        'financier' => $request->input('financier'),
        'image' => $request->input('image'),
        'confirmite' => $request->input('confirmite'),
        'satisfaction' => $request->input('satisfaction'),
        'impacte' => $request->input('impacte'),
        'facilite' => $request->input('facilite'),
        'vraisemblance' => $request->input('vraisemblance'),
        'indice' => $request->input('indice'),
        'criticite' => $request->input('criticite'),
        'niveaucrit' => $request->input('niveaucrit'),
    ]);
    $risques->save();
    return response()->json('save created!');
}

public function destroy($id)
{
    $risques = risque::find($id);
    $risques->delete();
    return response()->json(' deleted!');
}





}
