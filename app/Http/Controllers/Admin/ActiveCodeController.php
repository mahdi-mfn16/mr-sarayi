<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class ActiveCodeController extends Controller
{
    public function index()
    {
        $codes = ActiveCode::all();
        return view('admin.code.index', ['codes' => $codes]);
    }



    public function create()
    {
        $users = User::all();
        $videos = Video::all();
        return view('admin.code.create', ['users'=>$users, 'videos'=>$videos]);
    }



    public function store(Request $request)
    {
        
        $activeCode = new ActiveCode();

        $code = $activeCode->setCode($request->user_id, $request->video_id);

        // send code to user

        alert()->success('active code has created successfully!', 'success');
        return redirect(route('admin.code.index'));
    }




    public function destroy(ActiveCode $code)
    {

        $code->delete();

        alert()->success('Code has deleted successfully!', 'success');
        return redirect(route('admin.code.index'));
    }


    public function activate(ActiveCode $code)
    {

        $code->activateCode();
        alert()->success('Code has activate successfully!', 'success');
        return redirect(route('admin.code.index'));
    }

    public function deActivate(ActiveCode $code)
    {

        $code->deactivateCode();
        alert()->success('Code has deActivate successfully!', 'success');
        return redirect(route('admin.code.index'));
    }
}
