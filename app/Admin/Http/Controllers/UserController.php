<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Frontend\Requests\RegisterRequest;
use App\Http\Controllers\Frontend\Requests\UpdateRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function create()
    {
        $title = "Adding User";
        $action = route('users.store');
        $method ='POST';
        $roles = Role::pluck('name');
        return view('admin.user.adding')->with(compact('method','roles','action','title'));
    }

    public function edit(User $user)
    {
        $action = route('users.update', $user->id);
        $method = 'PUT';
        $title = "Updating User Information";
        $roles = Role::pluck('name');

        return view('admin.user.adding')->with(compact('method','roles','action','title','user'));
    }

    public function postLogout()
    {

        Auth::logout();
        return redirect('login');
    }

    public function index()
    {
        $users = User::orderByDesc('id')->get();
        $roles = Role::pluck('name');

        return view('admin.user.checking',compact('users','roles'));
    }

    public function store(RegisterRequest $request , User $user){
        //how to right
        //why we must write $user = ...
        $user = $user->create($request->validated());
        $user->assignRole($request->role);
        return redirect(route('users.index'));
    }

    public function sortByRole($role)
    {
        $users = User::role($role)->orderByDesc('id')->get();
        $roles = Role::pluck('name');

        return view('admin.user.checking',compact('users','roles'));
    }

    public function update(User $user, UpdateRequest $request)
    {
        $user->update($request->validated());
        $user->syncRoles($request->get('role'));
        return redirect(route('users.index'));

    }

    public function destroy(User $user)
    {
      $user->delete();
      return redirect(route('users.index'));
    }

}
