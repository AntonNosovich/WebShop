<?php

namespace App\Admin\Actions;

use App\Http\Controllers\Frontend\Requests\ProductRequest;
use App\Http\Controllers\Frontend\Requests\UpdateProductRequest;
use App\Models\ClientMenu;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductAction
{
    public function __construct(private ProductRepository $repository)
    {
    }

    public function find($id):Collection
    {
        return $this->repository->find($id);
    }

    public function handle():Collection
    {
        return $this->repository->get();
    }

    public function createProductAndItem(ProductRequest $request)
    {
        return $this->repository->create($request);
    }

    public function update(UpdateProductRequest $request, Product $product):Product
    {
        return $this->repository->update($request, $product);
    }

    public function getLatestProduct():Collection
    {
        return $this->repository->getLatest();
    }

    public function getTopProducts():Collection
    {
        return $this->repository->getTopProducts();
    }

    public function  getCategoryProducts(ClientMenu $category)
    {
        return $this->repository->productOfCategory($category);
    }

    public function getSize(ClientMenu $category)
    {
        return $this->repository->getSize($category);
    }

    public function extremum($products)
    {
        return $this->repository->getMinMax($products);
    }
}
