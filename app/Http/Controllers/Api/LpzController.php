<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Lpz;

class LpzController extends Controller
{
    public function getLpz()
    {
        $lpz = Lpz::all();
        $response = [
            'lpz' => $lpz
        ];
        return response()->json($response, 200);
    }

    public function postLpz(Request $request, Lpz $lpz)
    {
        $lpz = $lpz->create($request->all());
        return response()->json(['lpz' => $lpz], 201);
    }

    public function putLpz(Request $request, Lpz $lpz)
    {
        $lpz->update($request->all());
        return response()->json(['lpz' => $lpz], 200);
    }

    public function deleteLpz(Lpz $lpz)
    {
        $lpz->delete();
        return response()->json(['message'=>'Deleted'], 200);
    }
}
