<?php

namespace App\Admin\Http\DataTransferObjects;

use App\Http\Controllers\Frontend\Requests\ProductRequest;

class CreateProductData
{
   public string $name;

   public function fromRequest(ProductRequest $request): self
   {
       $this->name = $request->name;

       return $this;
   }
}
