<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Video\StoreRequest;
use App\Http\Requests\Admin\Video\UpdateRequest;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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




    public function edit(Course $course, Video $video)
    {      
        return view('admin.video.edit', ['course'=>$course, 'video'=>$video]);
    }




    public function update(UpdateRequest $request, Course $course, Video $video)
    {
        $data = $request->validated();

        if($request->hasFile('video')){

            if(File::exists(public_path($video->path))){
                File::delete(public_path($video->path));
            }

            $newVideo = $request->file('video');
            $videoObject = new Video();
            list($name, $path) = $videoObject->upload($newVideo, $relatedTable = 'courses', $relatedId = $course->id);
            
            $video->update([
                'name'=>$name,
                'path'=>'/uploads/'.$path,
                'show_name'=>$data['show_name'],
                'episode'=>$data['episode'],
                'length_time'=>$data['length_time'],
    
            ]);
        
        }else{

            $video->update([
                'show_name'=>$data['show_name'],
                'episode'=>$data['episode'],
                'length_time'=>$data['length_time'], 
            ]);
        }

        

        alert()->success('video has updated successfully!', 'success');
        return redirect(route('admin.video.index',['course'=>$course->id]));

    }




    public function destroy(Request $request, Course $course, Video $video)
    {
        if(File::exists(public_path($video->path))){
            File::delete(public_path($video->path));
            $video->update([
                'path'=>'',
                'name'=>'',
            ]);
        }


        if($request->ajax()){
            return "ok!";
        }
        $video->delete();
        alert()->success('video has deleted successfully!', 'success');
        return redirect(route('admin.video.index', ['course'=>$course->id]));
    }
}
