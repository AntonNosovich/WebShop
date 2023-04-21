<?php

namespace App\Repositories;


use App\Http\Controllers\Frontend\Requests\ProductRequest;
use App\Http\Controllers\Frontend\Requests\UpdateProductRequest;
use App\Models\ClientMenu;
use App\Models\Image;
use App\Models\Item;
use App\Models\Product;


class ProductRepository
{
    public function get()
    {
        return Product::where('is_available', true)
            ->with('items')
            ->orderByDesc('id')
            ->get();
    }

    public function find($id)
    {
        return Product::where('id', $id)
            ->with('items')
            ->get();
    }

    public function create(ProductRequest $request): Product
    {
        $request->toArray();
        $product = new Product();
        $item = new Item();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->is_available = $request->is_available;
        $tools = ClientMenu::find($request->category);
        $product->save();
        foreach ($request->image as $image){
            $filename = $image->store('product','public');
            Image::create([
                'product_id' => $product->id,
                'url' =>$filename
            ]);
        }
        $product->tools()->attach($tools);
        $item->sale = $request->sale;
        $item->size = $request->size;
        $item->article = $request->article;
        $item->quantity = $request->quantity;
        $item->raiting = 0;

        if ($request->sale == 0) {
            $item->sale_price = $request->price;        }
        else {
            $item->sale_price = +$request->price - (+$request->price) * ((+$request->sale) / 100);
        }
        $item->product_id = $product->id;
        $item->save();

        return $product;

    }
//
    public function update(UpdateProductRequest $request, Product $product):Product
    {
       $product->update([
           'name' => $request->name,
           'description' => $request->description,
           'price' => $request->price,
           'is_available' => $request->is_available,
       ]);

       if ($request->category != 0){
        $tools = ClientMenu::find($request->category);
        $product->tools()->sync($tools);
       }

        if ($request->image) {
            $product->images()->delete();
            foreach ($request->image as $image){
                $filename = $image->store('product','public');
                Image::create([
                    'product_id' => $product->id,
                    'url' => $filename
                ]);
            }
        }

        return $product;
    }

    public function getLatest()
    {
        return Product::where('is_available', true)
            ->latest('updated_at')
            ->limit(5)
            ->get();
    }

    public function getTopProducts()
    {
        return Product::where('is_available', true)
            ->orderBy('raiting','asc')
            ->get();
    }
    public function productOfCategory (ClientMenu $category)
    {

           $products = $category->products;

           return $products;
    }

    public function getSize(ClientMenu $category)
    {
        $products = $category->products;
        $size =[];

        foreach ($products as $product)
        {
           foreach ($product->items as $item)
           {
                array_push($size,$item->size);

           }
        }
        return array_unique($size);
    }

    public function getMinMax( $products)
    {
        $min = $products->first()->items->first()->sale_price;
        $max = 0;
        foreach ($products as $product ){

            foreach($product->items as $item ){

                if( $max<$item->sale_price) $max = $item->sale_price;

                if ($min>$item->sale_price) $min = $item->sale_price;
            }

        }
        return array(
            'min' => $min,
            'max' => $max
        );


    }
}
