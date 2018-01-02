<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Work;
use App\Model\Lpz;
use App\Model\WorkCategories;

class WorkController extends Controller
{
    public function index()
    {
        return view('admin.work.index', [
            'items' => Work::orderBy('id', 'desc')->paginate(50)]
        );
    }

    public function create()
    {
        return view('admin.work.create', [
            'lpz' => Lpz::orderBy('name', 'asc')->pluck('name', 'id')->all(),
            'cat' => WorkCategories::pluck('name', 'id')->all(),
            'work' => new Work,
            ]);
    }

    public function store(Request $request, Work $work)
    {
        $work = $work->create($request->all());

        return redirect()->route('admin.work.index');
    }

    public function show(Work $work)
    {
        return view('admin.work.show', ['work' => $work]);
    }

    public function edit(Work $work)
    {
        return view('admin.work.edit', [
            'work' => $work,
            'lpz' => Lpz::orderBy('name', 'asc')->pluck('name', 'id')->all(),
            'cat' => WorkCategories::pluck('name', 'id')->all(),
            ]);
    }

    public function update(Request $request, Work $work)
    {
        $work->update($request->all());

        return redirect()->route('admin.work.index');
    }

    public function destroy(Work $work)
    {
        $work->delete();

        return 'success';
    }
}
