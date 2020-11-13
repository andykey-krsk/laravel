<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;
use Response;

class AdminSourceController extends Controller
{
    public function index()
    {
        return Response::view('admin.source.index', [
            'sources' => Source::query()->paginate(5),
            //'countMews' =>,
        ]);
    }

    public function edit($id)
    {
        $source = Source::query()->findOrFail($id);
        return Response::view('admin.source.edit', [
            'source' => $source,
        ]);
    }

    public function update(Request $request, $id)
    {
        $source = Source::query()->findOrFail($id);
        $source->update($request->except('_token'));
        return redirect()->route('source.index');
    }

    public function create()
    {
        return Response::view('admin.source.create');
    }

    public function store(Request $request)
    {
        Source::query()->create($request->except('_token'));
        return redirect()->route('source.index');

    }

    public function destroy($id)
    {
        Source::destroy($id);
        return Response::json( [
            'status' => true,
        ]);
    }
}
