<?php

namespace App\Http\Controllers;

use App\Models\Dpo;
use Illuminate\Http\Request;

class DpoController extends Controller
{
    public function checkDpo(Request $request)
    {
        $request->validate([
            'nik' => 'required|string'
        ]);

        $nik = $request->nik;

        $dpo = Dpo::where('nik', $nik)->first();

        if ($dpo) {
            return response()->json([
                'status' => 'dpo',
                'message' => 'Person is in the DPO list',
            ]);
        } else {
            return response()->json([
                'status' => 'not_dpo',
                'message' => 'Person is not in the DPO list',
            ]);
        }
    }
}
