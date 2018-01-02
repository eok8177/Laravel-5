<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Lpz;

class LpzController extends Controller
{
    public function index()
    {
        return view('admin.lpz.index', ['items' => Lpz::all()]);
    }

    public function create()
    {
        return view('admin.lpz.create', ['lpz' => new Lpz]);
    }

    public function store(Request $request, Lpz $lpz)
    {
        $lpz = $lpz->create($request->all());

        return redirect()->route('admin.lpz.index');
    }

    public function show(Lpz $lpz)
    {
        return view('admin.lpz.show', ['lpz' => $lpz]);
    }

    public function edit(Lpz $lpz)
    {
        return view('admin.lpz.edit', ['lpz' => $lpz]);
    }

    public function update(Request $request, Lpz $lpz)
    {
        $lpz->update($request->all());

        return redirect()->route('admin.lpz.index');
    }

    public function destroy(Lpz $lpz)
    {
        $lpz->delete();

        return 'success';
    }
}
