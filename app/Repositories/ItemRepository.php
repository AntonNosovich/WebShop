<?php

namespace App\Repositories;


use App\Http\Controllers\Frontend\Requests\ItemRequest;
use App\Http\Controllers\Frontend\Requests\ProductRequest;
use App\Http\Controllers\Frontend\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


class ItemRepository
{
    protected function get(ItemRequest $request)
    {
        return Product::where('id',$request->product)
            ->first();
    }
    public function create(ItemRequest $request ): Item
    {
        $request->toArray();
        $item = new Item();
        $item->sale = $request->sale;
        $item->size = $request->size;
        $item->article = $request->article;
        $item->quantity = $request->quantity;
        $item->raiting = 0;
        $product = $this->get($request);
        if ($request->sale == 0) {
            $item->sale_price = $product->price;        }
        else {
            $item->sale_price = (+$product->price) - ((+$product->price) * ((+$request->sale) / 100));
        }
        $item->product_id = $product->id ;
        $item->save();
        return $item;
    }

    public function update(UpdateItemRequest $request,Item $item): Item
    {
        $item->update([
            'article' => $request->article,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'product_id' => $request->product,
             'sale'=> $request->sale,
            ]);
        $product = Product::find($request->product);
        if ($request->sale == 0) {
            $item->sale_price = $product->price;
            $item->save();
        }
        else {

            $price = (+$product->price)-((+$product->price)*((+$request->sale)/100));
            $item->sale_price = $price;
            $item->save();
        }
        return $item;
    }
}
