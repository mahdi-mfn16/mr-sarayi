<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        $category = Category::create([
            'name'=>$data['name'],
            'text'=>$data['text'],
            'slug'=>$data['slug'],
        ]);

        if($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageModel = new Image();
            $imageModel->upload($image = $imageFile , $belongModel = $category, $tableName = 'categories');
        }

        alert()->success('category has created successfully!', 'success');
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

        $oldImage = $category->image;
    

        if($request->hasFile('image')){

            if($oldImage){
                if(File::exists(public_path($oldImage->path))){
                    File::delete(public_path($oldImage->path));
                    $oldImage->delete();
                }
            }
            
            $newImage = $request->file('image');
            $imageModel = new Image();
            $imageModel->upload($image = $newImage , $belongModel = $category, $tableName = 'categories');
        }

        alert()->success('category has updated successfully!', 'success');
        return redirect(route('admin.category.index'));
    }




    public function destroy(Category $category)
    {
        if(File::exists(public_path($category->image->path))){
            File::delete(public_path($category->image->path));
            $category->image->delete();
        }

        $category->delete();

        alert()->success('category has deleted successfully!', 'success');
        return redirect(route('admin.category.index'));
    }
}
