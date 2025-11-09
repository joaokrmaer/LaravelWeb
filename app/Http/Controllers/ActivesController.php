<?php

namespace App\Http\Controllers;

use App\Models\Active;
use Illuminate\Http\Request;

class ActivesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        $active = Active::create($request->all());

        return response()->json([
            'message' => 'Ativo cadastrado com sucesso.',
            'data' => $active,
        ]);
    }
}
