<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Actions\ClientMenuAction;
use App\Http\Controllers\Frontend\Requests\ClientMenuRequest;
use App\Http\Controllers\Frontend\Requests\UpdateClientMenuRequest;
use App\Models\ClientMenu;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;

class ClientMenuController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function index(ClientMenuAction $action)
    {
        $route = route('client-menu.store');
        $method = 'POST';
        $tools = $action->handle();
        $parents = $action->getParents();
        $title = "Create Tool";

        return view('admin.client-menu.create')
            ->with(compact('method','tools','parents','route','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ClientMenuAction $action, ClientMenuRequest $request)
    {
        $action->create($request);

        return redirect(route('client-menu.index'));
    }

    public function edit(ClientMenu $clientMenu, ClientMenuAction $action)
    {
        $route = route('client-menu.update', $clientMenu->id);
        $method = 'PUT';
        $title = "Update Tool";
        $parents = $action->getParents();
        $tools = $action->handle();

        return view('admin.client-menu.create')
            ->with(compact('method','clientMenu','title','parents','tools','route'));
    }

    /**
     * @param ClientMenuAction $action
     * @param Request $request
     * @param ClientMenu $clientMenu
     * @return Application|RedirectResponse|Redirector
     */
    public function update(ClientMenuAction $action , UpdateClientMenuRequest $request, ClientMenu $clientMenu)
    {
        $action->update($request, $clientMenu);

        return redirect(route('client-menu.index'));
    }

    public function destroy(ClientMenu $clientMenu)
    {
        $clientMenu->child()->delete();
        $clientMenu->delete();

        return redirect(route('client-menu.index'));
    }
}
