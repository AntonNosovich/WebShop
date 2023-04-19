<?php

namespace App\Admin\Actions;

use App\Http\Controllers\Frontend\Requests\ClientMenuRequest;
use App\Http\Controllers\Frontend\Requests\UpdateClientMenuRequest;
use App\Models\ClientMenu;
use App\Repositories\ClientMenuRepository;
use Illuminate\Database\Eloquent\Collection;

class ClientMenuAction
{

    public function __construct(private ClientMenuRepository $repository)
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

    public function getParents()
    {
        return $this->repository->getParents();
    }

    public function create(ClientMenuRequest $request):ClientMenu
    {
        return $this->repository->create($request);
    }

    public function update(UpdateClientMenuRequest $request, ClientMenu $clientMenu):ClientMenu
    {
        return $this->repository->update($request, $clientMenu);
    }
}
