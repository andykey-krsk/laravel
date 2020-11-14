<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertCategoryRequest;
use App\Models\Category;
use Response;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return Response::view('admin.category.index', [
            'categories' => Category::query()->paginate(3),
        ]);
    }

    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        return Response::view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(UpsertCategoryRequest $request, $id)
    {
        $category = Category::query()->findOrFail($id);
        $category->update($request->except('_token'));
        return redirect()->route('category.index');
    }

    public function create()
    {
        return Response::view('admin.category.create');
    }

    public function store(UpsertCategoryRequest $request)
    {
        Category::query()->create($request->except('_token'));
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return Response::json( [
            'status' => true,
        ]);
    }
}
