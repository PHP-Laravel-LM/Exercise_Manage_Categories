<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ControllerCategory extends Controller
{
    public function index(Request $request, $page = 1)
    {
        $categories = ModelCategory::all()->toArray();
        return view('index', [
            'categories'    => $categories,
            'page'          => $page
        ]);
    }

    public function getCategory(Request $request, $id)
    {
        try {
            $category = ModelCategory::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(null, 500);
        }
        return response()->json(ModelCategory::find($id));
    }

    public function createCategory(Request $request)
    {
        // Check if request is valid
        if (!$request->filled('name')) {
            return response()->json(null, 500);
        }

        $name = $request->input('name');
        $parentId = $request->input('parentId', null);
        $category = new ModelCategory();
        $category->name = $name;
        $category->parentId = $parentId;
        $category->save();
        return response()->json(null, 200);
    }

    public function updateCategory(Request $request, $id)
    {
        // Check if request is valid
        if (!$request->filled('name')) {
            return response()->json(null, 500);
        }

        $name = $request->input('name');
        $parentId = $request->input('parentId', null);
        try {
            $category = ModelCategory::findOrFail($id);
            $category->name = $name;
            $category->parentId = $parentId;
            $category->save();
        } catch (ModelNotFoundException $e) {
            return response()->json(null, 500);
        }
        return response()->json(null, 200);
    }

    public function deleteCategory(Request $request, $id)
    {
        try {
            ModelCategory::where('parentId', $id)->firstOrFail(); //Check if category has child or not
        } catch (ModelNotFoundException $e) {
            $category = ModelCategory::findOrFail($id);
            $category->delete();
            return response()->json(null, 200);
        }
        return response()->json(null, 500);
    }
}
