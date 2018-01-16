<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Work;
use App\Model\Lpz;
use App\Model\WorkCategories;

class WorkController extends Controller
{
    public function getWorks()
    {
        $work = Work::orderBy('id', 'desc')->get();
        $response = [
            'work' => $work,
            'lpz' => Lpz::orderBy('name', 'asc')->get()->keyBy('id'),
            'cat' => WorkCategories::get()->keyBy('id'),
        ];
        return response()->json($response, 200);
    }

    public function getWork(Work $work)
    {
        $response = [
            'work' => $work,
            'lpz' => Lpz::orderBy('name', 'asc')->pluck('name', 'id')->all(),
            'cat' => WorkCategories::pluck('name', 'id')->all(),
        ];
        return response()->json($response, 201);
    }

    public function postWork(Request $request, Work $work)
    {
        $work = $work->create($request->all());
        return response()->json(['work' => $work], 201);
    }

    public function putWork(Request $request, Work $work)
    {
        $work->update($request->all());
        return response()->json(['work' => $work], 200);
    }

    public function deleteWork(Work $work)
    {
        $work->delete();
        return response()->json(['message'=>'Deleted'], 200);
    }
}
