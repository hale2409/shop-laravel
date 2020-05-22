<?php

namespace App\Http\Controllers\Admin;

use App\Components\MenuRecusive;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminMenuController extends Controller
{
    private $menu;
    private $menuRecusive;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menu = $menu;
        $this->menuRecusive = $menuRecusive;
    }

    public function index() {
        $menus = $this->menu->paginate(10);
        return view('admin.menu.index', compact('menus'));
    }
    public function create() {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menu.add', compact('optionSelect'));
    }
    public function store(Request $request) {
        $this->menu->create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'parent_id'=>$request->parent_id,
        ]);
        return redirect()->route('menus.create');

    }
    public function edit($id) {
        $menuFollowIdEdit = $this->menu->find($id);
        $optionHtml = $this->menuRecusive->menuRecusiveEdit($menuFollowIdEdit->parent_id);
        return view('admin.menu.edit', compact('menuFollowIdEdit', 'optionHtml'));
    }
    public function update(Request $request, $id) {
        $this->menu->find($id)->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'parent_id'=>$request->parent_id
        ]);
        return redirect()->route('menus.index');
    }

    public function delete($id) {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
