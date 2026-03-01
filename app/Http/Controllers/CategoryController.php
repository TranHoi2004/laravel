<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_delete', 0)
            ->with('parent')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active ?? 1,
            'is_delete' => 0
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Thêm danh mục thành công');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $categories = Category::where('id', '!=', $id)
            ->where('is_delete', 0)
            ->get();

        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        if ($this->isLoop($request->parent_id, $id)) {
            return back()->withErrors([
                'parent_id' => 'Không được chọn danh mục con của chính nó'
            ]);
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active ?? 1,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->update(['is_delete' => 1]);

        return redirect()->route('category.index')
            ->with('success', 'Xóa thành công');
    }

    private function isLoop($parentId, $id)
    {
        while ($parentId) {
            if ($parentId == $id) {
                return true;
            }
            $parent = Category::find($parentId);
            $parentId = $parent ? $parent->parent_id : null;
        }
        return false;
    }
}