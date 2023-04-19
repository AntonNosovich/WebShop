<?php
namespace App\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller{

    public function create()
{
    $action = route('roles.store');
    $method ='POST';
    $title ='Create Role';

    return view('admin.roles.create')->with(compact('title','action','method'));
}

    public function edit(Role $role)
{
    $action = route('roles.update', $role->id);
    $method = 'PUT';
    $title = 'Change Role name';

    return view('admin.roles.create')->with(compact('title','action','method','role'));
}



    public function index()
{
    $title = 'List of Roles';
    $roles = Role::all();

    return view('admin.roles.show')->with(compact('title','roles'));
}

    public function store(){
        $validated = request()->validate([
            'name' => 'required|unique:roles|min:3|max:25',
            ]);
        Role::create(['name' => $validated['name']]);

        return redirect(route('roles.index'));

}



    public function update(Role $role)
{
    $validated = request()->validate([
            'name' => ['required',
                       'unique:roles,name,'.$role->id.',id',
                       'min:3',
                       'max:25']
    ]);
    $role->update(['name' => $validated['name']]);

    return redirect(route('roles.index'));
}

    public function destroy(Role $role)
{
    $role->delete();

    return redirect(route('roles.index'));
}
}

