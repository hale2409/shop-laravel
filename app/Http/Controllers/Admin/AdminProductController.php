<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Components\CategoryRecusive;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    protected $category;
    public function __construct(CategoryRecusive $categoryRecusive, Category $category)
    {
        $this->category = $category;
        $this->categoryRecusive = $categoryRecusive;
    }

    public function index() {
        return view('admin.product.index');
    }
    public function create() {
        $htmlOption = $this->categoryRecusive->categoryRecusiveAdd();
        return view('admin.product.add', compact('htmlOption'));
    }

    public function store() {

    }
    public function edit() {

    }
    public function update() {

    }
    public function delete() {

    }

}
