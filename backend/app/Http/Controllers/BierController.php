<?php

namespace App\Http\Controllers;

use App\Models\Bier;
use Illuminate\Http\Request;

class BierController extends Controller
{
    public function index()
    {

        $bier = Bier::orderBy('name')->paginate(25);

        return view('bier/index', compact('bier'));
    }
    public function show(Bier $bier)
    {
        $comments = $bier->comments;

        return view('bier/show', compact('bier', 'comments'));
    }
    public function update(Bier $bier)
    {
        $formFields['like_count'] = $bier->like_count + 1;
        $bier->update($formFields);
        
        return response()->json(['like_count' => $bier->like_count]);
    }
    public function search(Request $request)
    {
        $bier = Bier::search($request->query)->get();

        return view('bier/index', compact('bier'));
    }
}
