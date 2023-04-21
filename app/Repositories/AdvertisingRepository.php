<?php

namespace App\Repositories;

use App\Http\Controllers\Frontend\Requests\AdvertisingRequest;
use App\Http\Controllers\Frontend\Requests\UpdateAdvertisingRequest;
use App\Models\AdverestingImage;
use App\Models\Advertising;
use App\Models\ClientMenu;

class AdvertisingRepository
{
    public function get()
    {
        return Advertising::where('is_active', true)
            ->get();
    }

   public function getAll()
   {
       return Advertising::all();
   }

   public function create(AdvertisingRequest $request): Advertising
   {
       $request->toArray();
       $advertising = new Advertising();
       $advertising->category_id = $request->category_id;
       $advertising->item_id = $request->item_id;
       $advertising->is_active = $request->active ;
       $advertising->child_img = $request->child_image->store('advertising','public');
       $advertising->child_item_id = $request->item_child_id;
       $advertising->save();
       foreach ($request->image as $image){
           $filename = $image->store('advertising','public');
           AdverestingImage::create([
               'advertising_id' => $advertising->id,
               'url' =>$filename
           ]);
       }

       return $advertising;
   }

   public function update(UpdateAdvertisingRequest $request,Advertising $advertising):Advertising
   {
       $advertising->update([
           'category_id' => $request->category_id,
           'item_id' => $request->item_id,
           'is_active' => $request->active,
           'child_item_id' => $request->item_child_id,
       ]);
       if ($request->image) {
           $advertising->images()->delete();
           foreach ($request->image as $image) {
               $filename = $image->store('advertising', 'public');
               AdverestingImage::create([
                   'advertising_id' => $advertising->id,
                   'url' => $filename
               ]);
           }
       }
           if ($request->child_image){
           $advertising->update([
               'child_img'=> $request->child_image,
           ]);
       }

       return $advertising;
   }

    public function getCategoryAdvertising(ClientMenu $category):Advertising
    {
        $advertising = $category->advertising;

        if ($advertising == null ||  $advertising->is_active == 0){
            $advertising = Advertising::where('category_id',0)
                ->where('is_active',true)
                ->first();        }

        return $advertising;
    }
}
