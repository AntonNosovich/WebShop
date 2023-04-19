<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Frontend\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class MenuController extends Controller
{
    public function create()
    {
        $action = route('menus.store');
        $method = 'POST';
        $title = 'Create Menu Tool';
        $button = 'Add';
        $roles = Role::pluck('name');
        $menus = Menu::orderByDesc('id')->get();

        return view('admin.menu.menuSettings')
            ->with(compact('title','method','action','roles','button','menus'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request
     * @param Menu $menu
     */
    public function store(MenuRequest $request, Menu $menu)
    {
        $menu = $menu->create([
            'name' => $request->name,
            'route' => $request->route,
        ]);

        if ($request->image){
           $menu->update(['image' => $request->file('image')
               ->store('uploads','public')]);
        }
        $menu->assignRole($request->role);

        return redirect(route('menus.create'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Menu $menu
     */
    public function edit(Menu $menu)
    {
        $action = route('menus.update', $menu->id);
        $method = 'PUT';
        $title = "Updating Menu Tool";
        $roles = Role::pluck('name');
        $button = 'Change';
        $menus = Menu::orderByDesc('id')->get();
        return view('admin.menu.menuSettings')
            ->with(compact('button','roles','method','action','title','menus','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Menu $menu
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'unique:menus,name,'.$menu->id.',id',
                ],
            'route' => [
                'required',
                'unique:menus,route,'.$menu->id.',id',
             ],
        ]);
        $menu->syncRoles($request->get('role'));
        $menu->update([
            'name' => $validated['name'],
            'route' => $validated['route']
        ]);

        if ($request->image) {
            $saved = $request
                ->file('image')
                ->store('uploads','public');
            $menu->update([
                'image' => $saved
            ]);
        }
        else {
            $menu->update([
                'image' => null
            ]);
            }


        return redirect(route('menus.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect(route('menus.create'));
    }
}
