<?php

namespace App\Admin\Actions;

use App\Http\Controllers\Frontend\Requests\AdvertisingRequest;
use App\Http\Controllers\Frontend\Requests\UpdateAdvertisingRequest;
use App\Models\Advertising;
use App\Repositories\AdvertisingRepository;
use Illuminate\Database\Eloquent\Collection;

class AdvertisingAction
{

    public function __construct(private AdvertisingRepository $repository)
    {

    }

    public function fronthandle():Collection
    {
        return $this->repository->get();
    }

    public function handle():Collection
    {
       return $this->repository->getAll();
    }


    public function create(AdvertisingRequest $request):Advertising
    {
        return $this->repository->create($request);
    }

    public function update(UpdateAdvertisingRequest $request, Advertising $advertising):Advertising
    {
        return $this->repository->update($request, $advertising);
    }
}
