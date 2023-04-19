<?php
namespace App\Admin\Http\Controllers;

use App\Admin\Actions\ProductAction;
use App\Admin\Http\DataTransferObjects\CreateProductData;
use App\Http\Controllers\Frontend\Requests\UpdateProductRequest;
use App\Models\ClientMenu;
use App\Models\Product;
use App\Http\Controllers\Frontend\Requests\ProductRequest;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use DB;



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
        $topProduct =$action->getTopProducts();

        return view('frontend.product.main')->with(compact('latestProduct','topProduct'));
    }

    public function productCategory(ProductAction $action,  $id)
    {
        $category = ClientMenu::find($id);
        $latestProduct = $action->getLatestProduct();
        $categoryProduct = $action->getCategoryProducts($category);

        return view('frontend.product.maincategory')->with(compact('latestProduct','categoryProduct'));

    }
}

