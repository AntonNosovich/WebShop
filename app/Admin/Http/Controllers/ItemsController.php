<?php
namespace App\Admin\Http\Controllers;

use App\Admin\Actions\ItemAction;
use App\Admin\Actions\ProductAction;
use App\Http\Controllers\Frontend\Requests\ItemRequest;
use App\Http\Controllers\Frontend\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Routing\Controller;


class ItemsController extends Controller
{

    public function create(ProductAction $productAction)
    {
        $action = route('item.store');
        $method = 'POST';
        $title = 'Create Item';
        $products = $productAction->handle();

        return view('admin.item.create')->with(compact('title', 'action', 'method', 'products'));
    }

    public function store(ItemRequest $request, ItemAction $action)
    {
        $item = $action->create($request);

        return redirect(route('item.show',$item));
    }

    public function show(Item $item) {

        $products = array($item->product);
        $route ='show';

        return view('admin.product.index')->with(compact('products','route'));
    }

    public function edit(Item $item )
    {
        $action = route('item.update', $item->id);
        $method = 'PUT';
        $title = 'Change item ';

        return view('admin.item.create')->with(compact('title','action','method', 'item'));
    }

    public function update(ItemAction $action, UpdateItemRequest $request,Item $item)
    {
        $item=$action->update($request, $item);

        return redirect(route('item.show',$item));
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect(route('product.index'));
    }
}
