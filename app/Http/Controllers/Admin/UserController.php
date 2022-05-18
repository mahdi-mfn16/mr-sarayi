<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }



    public function create()
    {
        return view('admin.user.create');
    }



    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'privilege' => $data['privilege'],
            'password' => bcrypt($data['password']),
        ]);


        alert()->success('User has created successfully!', 'success');
        return redirect(route('admin.user.index'));
    }




    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }




    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $updatedFields = [
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'privilege' => $data['privilege'],
        ];

        if ($data['password']) {
            $updatedFields['password'] = bcrypt($data['password']);
        }
        
        $user->update($updatedFields);


        alert()->success('User has updated successfully!', 'success');
        return redirect(route('admin.user.index'));
    }




    public function destroy(User $user)
    {

        $user->delete();

        alert()->success('User has deleted successfully!', 'success');
        return redirect(route('admin.user.index'));
    }
}
