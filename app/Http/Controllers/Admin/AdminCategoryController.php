<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Components\CategoryRecusive;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    private $category;
    private  $categoryRecusive;
    public function __construct(CategoryRecusive $categoryRecusive, Category $category)
    {
        $this->categoryRecusive = $categoryRecusive;
        $this->category = $category;
    }

    public function index() {
        $categories = $this->category->paginate(10);
        return view('admin.category.index', compact('categories'));
    }
    public function create() {
        $optionSelect = $this->categoryRecusive->categoryRecusiveAdd();
        return view('admin.category.add', compact('optionSelect'));
    }
    public function store(Request $request) {
        $this->category->create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'parent_id'=>$request->parent_id
        ]);
        return redirect()->route('categories.index');
    }
    public function edit($id) {
        $categoryFollowIdEdit = $this->category->find($id);
        $optionHtml = $this->categoryRecusive->categoryRecusiveEdit($categoryFollowIdEdit->parent_id);
        return view('admin.category.edit', compact('optionHtml', 'categoryFollowIdEdit'));
    }

    public function update(Request $request, $id) {
        $this->category->find($id)->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'parent_id'=>$request->parent_id
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id) {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }

}
