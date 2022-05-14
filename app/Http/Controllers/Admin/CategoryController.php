<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index' , ['categories' => $categories]);
    }



    public function create()
    {
        return view('admin.category.create');
    }



    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Category::create([
            'name'=>$data['name'],
            'text'=>$data['text'],
            'slug'=>$data['slug'],
        ]);

        return redirect(route('admin.category.index'));
    }




    public function edit(Category $category)
    {      
        return view('admin.category.edit', ['category'=>$category]);
    }




    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update([
            'name'=>$data['name'],
            'text'=>$data['text'],
            'slug'=>$data['slug'],
        ]);

        return redirect(route('admin.category.index'));
    }




    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('admin.category.index'));
    }
}
