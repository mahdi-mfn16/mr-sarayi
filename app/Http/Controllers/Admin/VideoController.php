<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Video\StoreRequest;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Course $course)
    {
        $videos = $course->videos->all();
        return view('admin.video.index' , ['videos' => $videos, 'course'=>$course]);
    }



    public function create(Course $course)
    {
        return view('admin.video.create',['course'=>$course]);
    }



    public function store(StoreRequest $request, Course $course)
    {
        $data = $request->validated();

        $videoObject = new Video();
        
        if($request->hasFile('video')){
            $videoFile = $request->file('video');
            list($name, $path) = $videoObject->upload($video = $videoFile, $relatedTable = 'courses', $relatedId = $course->id);
        }

        $video = $videoObject->create([
            'name'=>$name,
            'path'=>'/uploads/'.$path,
            'show_name'=>$data['show_name'],
            'episode'=>$data['episode'],
            'length_time'=>$data['length_time'],
            'course_id'=>$course->id,

        ]);

        alert()->success('video has published successfully!', 'success');
        return redirect(route('admin.video.index',['course'=>$course->id]));
    }




    // public function edit(Category $category)
    // {      
    //     return view('admin.category.edit', ['category'=>$category]);
    // }




    // public function update(UpdateRequest $request, Category $category)
    // {
    //     $data = $request->validated();

    //     $category->update([
    //         'name'=>$data['name'],
    //         'text'=>$data['text'],
    //         'slug'=>$data['slug'],
    //     ]);

    //     $oldImage = $category->image;
    

    //     if($request->hasFile('image')){

    //         if($oldImage){
    //             if(File::exists(public_path($oldImage->path))){
    //                 File::delete(public_path($oldImage->path));
    //                 $oldImage->delete();
    //             }
    //         }
            
    //         $newImage = $request->file('image');
    //         $imageModel = new Image();
    //         $imageModel->upload($image = $newImage , $belongModel = $category, $tableName = 'categories');
    //     }

    //     alert()->success('category has updated successfully!', 'success');
    //     return redirect(route('admin.category.index'));
    // }




    // public function destroy(Category $category)
    // {
    //     if(File::exists(public_path($category->image->path))){
    //         File::delete(public_path($category->image->path));
    //         $category->image->delete();
    //     }

    //     $category->delete();

    //     alert()->success('category has deleted successfully!', 'success');
    //     return redirect(route('admin.category.index'));
    // }
}
