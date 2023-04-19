<?php

namespace App\Repositories;

use App\Http\Controllers\Frontend\Requests\ClientMenuRequest;
use App\Http\Controllers\Frontend\Requests\UpdateClientMenuRequest;
use App\Models\ClientMenu;

class ClientMenuRepository
{
    public function get()
    {
        return ClientMenu::where('active', true)
            ->where('parent_id', 0)
            ->with('child')
            ->get();
    }

   public function getAll()
   {
       return ClientMenu::where('parent_id', 0)
           ->with('child')
           ->get();
   }

   public function getParents(){
        return ClientMenu::where('parent_id', 0)
            ->where('active',true)
            ->get();
   }

   public function create(ClientMenuRequest $request): ClientMenu
   {
       $request->toArray();
       $tool = new ClientMenu();
       $tool->name = $request->name;
       $tool->slag = $request->slag;
       $tool->active = $request->active ;
       $tool->is_new = $request->is_new;
       $tool->parent_id =$request->parent_id;
       $tool->save();

       return $tool;
   }

   public function update(UpdateClientMenuRequest $request,ClientMenu $clientMenu): ClientMenu
   {
       $clientMenu->update([
           'name' => $request->name,
           'slag' => $request->slag,
           'active' => $request->active,
           'is_new' => $request->is_new,
           'parent_id' => $request->parent_id,
       ]);

       return $clientMenu;
   }
}
