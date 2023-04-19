<?php

namespace App\Admin\Actions;

use App\Http\Controllers\Frontend\Requests\ItemRequest;
use App\Http\Controllers\Frontend\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Repositories\ItemRepository;

class ItemAction
{
    public function __construct(private ItemRepository $repository)
    {
    }

    public function update(UpdateItemRequest $request, Item $item):Item
    {
        return $this->repository->update($request, $item);
    }

    public function create(ItemRequest $request):Item
    {
        return $this->repository->create($request);
    }
}
