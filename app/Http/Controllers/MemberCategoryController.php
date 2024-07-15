<?php

namespace App\Http\Controllers;

use App\Models\MemberCategory;
use Illuminate\Http\Request;

class MemberCategoryController extends Controller
{
    public function index()
    {
        $categories = MemberCategory::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = MemberCategory::create($request->all());
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = MemberCategory::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
        ]);

        $category = MemberCategory::findOrFail($id);
        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = MemberCategory::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}
