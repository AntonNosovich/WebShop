<?php
namespace App\Admin\Http\Controllers;

use App\Admin\Actions\AdvertisingAction;
use App\Admin\Actions\ItemAction;
use App\Admin\Actions\ProductAction;
use App\Http\Controllers\Frontend\Requests\UpdateProductRequest;
use App\Models\Advertising;
use App\Models\ClientMenu;
use App\Models\Item;
use App\Models\Product;
use App\Http\Controllers\Frontend\Requests\ProductRequest;
use Illuminate\Routing\Controller;




class ProductsController extends Controller{

    public function create()
{
    $action = route('product.store');
    $method ='POST';
    $title ='Create Product';

    return view('admin.product.create')
        ->with(compact('title','action','method'));
}

    public function edit(Product $product)
{
    $action = route('product.update', $product->id);
    $method = 'PUT';
    $title = 'Change product ';

    return view('admin.product.update')
        ->with(compact('title','action','method','product'));
}



    public function index(ProductAction $action)
    {
        $products=$action->handle();
        $route='index';

        return view('admin.product.index')
            ->with(compact('products','route'));
    }

    public function store(ProductRequest $request, ProductAction $action)
    {
//        $requestData = new CreateProductData();
//        $requestData = $requestData->fromRequest();

        $action->createProductAndItem($request);

        return redirect(route('product.index'));
    }



    public function update(ProductAction $action, UpdateProductRequest $request, Product $product)
   {
    $action->update($request, $product);

    return redirect(route('product.index'));
   }

    public function destroy(Product $product)
    {
        $product->items()->delete();
        $product->images()->delete();
        $product->delete();

        return redirect(route('product.index'));
    }

    public function frontendIndex(ProductAction $action)
    {
        $latestProduct = $action->getLatestProduct();
        $Product =$action->getTopProducts();

        $advertising = Advertising::where('category_id',0)
            ->where('is_active',true)
            ->first();

        return view('frontend.product.main')->with(compact('advertising','latestProduct','Product'));
    }

    public function productCategory(ProductAction $action,  $id,AdvertisingAction $actionadvertising)
    {
        $category = ClientMenu::find($id);
        $latestProduct = $action->getLatestProduct();
        $Product = $action->getCategoryProducts($category);
        $advertising = $actionadvertising->getCategoryAdvertising($category);

        return view('frontend.product.main')->with(compact('latestProduct','Product','advertising'));
    }

    public function indexCategoryProduct($id,ProductAction $action){

        $category = ClientMenu::find($id);
        $products = $action->getCategoryProducts($category);
        $size = $action->getSize($category);
        $minMax =$action->extremum($products);

        return view('frontend.product.category')->with(compact('category','products','size','minMax'));
    }

    public function showProduct($id,ItemAction $action,ProductAction $actionProduct ){

        $item = Item::find($id);
        $sizes = $action->getSize($item);
        $products = $actionProduct->getTopProducts();


        return view('frontend.product.show')
            ->with(compact('item','sizes','products'));
    }

}

