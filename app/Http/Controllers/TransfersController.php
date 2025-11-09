<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active;

class TransfersController extends Controller
{
    public function transfer(Request $request)
    {
        $request->validate([
            'from_user' => 'required|exists:users,id',
            'to_user' => 'required|exists:users,id',
            'actives_from' => 'required|array',
            'actives_to' => 'required|array'
        ]);

        $sumFrom = Active::whereIn('id', $request->actives_from)
            ->where('user_id', $request->from_user)
            ->sum('value');

        $sumTo = Active::whereIn('id', $request->actives_to)
            ->where('user_id', $request->to_user)
            ->sum('value');

        if ($sumFrom != $sumTo) {
            return response()->json(['error' => 'Valores contábeis não equivalentes'], 422);
        }

        Active::whereIn('id', $request->actives_from)->update(['user_id' => $request->to_user]);
        Active::whereIn('id', $request->actives_to)->update(['user_id' => $request->from_user]);

        return response()->json(['message' => 'Transferência realizada com sucesso.']);
    }
}
