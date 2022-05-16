<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\StoreRequest;
use App\Http\Requests\Admin\Course\UpdateRequest;
use App\Models\Course;
use App\Models\Image;
use App\Rules\ImageExistRule;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index' , ['courses' => $courses]);
    }



    public function create()
    {
        return view('admin.course.create');
    }



    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $course = Course::create([
            'name'=>$data['name'],
            'text'=>$data['text'],
            'slug'=>$data['slug'],
            'description'=>$data['description'],
            'free'=>$data['free'],
            'price'=>$data['free'] ? 0 : $data['price'],
            'length_time'=>$data['length_time'],
            
        ]);


        if($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageModel = new Image();
            $imageModel->upload($image = $imageFile , $belongModel = $course, $tableName = 'courses');
        }
        
        alert()->success('course has created successfully!', 'success');
        return redirect(route('admin.course.index'));
    }




    public function edit(Course $course)
    {      
        return view('admin.course.edit', ['course'=>$course]);
    }




    public function update(UpdateRequest $request, Course $course)
    {
        
        $data = $request->validated();

        $course->update([
            'name'=>$data['name'],
            'text'=>$data['text'],
            'slug'=>$data['slug'],
            'description'=>$data['description'],
            'free'=>$data['free'],
            'price'=>$data['free'] ? 0 : $data['price'],
            'length_time'=>$data['length_time'],
        ]);


        $oldImage = $course->image;
    

        if($request->hasFile('image')){

            if($oldImage){
                if(File::exists(public_path($oldImage->path))){
                    File::delete(public_path($oldImage->path));
                    $oldImage->delete();
                }
            }
            
            $newImage = $request->file('image');
            $imageModel = new Image();
            $imageModel->upload($image = $newImage , $belongModel = $course, $tableName = 'courses');
        }

        
        alert()->success('category has updated successfully!', 'success');
        return redirect(route('admin.course.index'));
    }




    public function destroy(Course $course)
    {
        if(File::exists(public_path($course->image->path))){
            File::delete(public_path($course->image->path));
            $course->image->delete();
        }
        $course->delete();
        alert()->success('category has deleted successfully!', 'success');
        return redirect(route('admin.course.index'));
    }
}
