<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Actions\AdvertisingAction;
use App\Admin\Actions\ClientMenuAction;
use App\Http\Controllers\Frontend\Requests\AdvertisingRequest;
use App\Http\Controllers\Frontend\Requests\UpdateAdvertisingRequest;
use App\Models\Advertising;
use App\Models\ClientMenu;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;

class AdvertisingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */


    public function index(AdvertisingAction $action)
    {
        $route = route('advertising.store');
        $method = 'POST';
        $advertisings = $action->handle();
        $title = "Create Advertising";

        return view('admin.advertising.create')
            ->with(compact('method','advertisings','route','title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(AdvertisingAction $action, AdvertisingRequest $request)
    {
        $action->create($request);

        return redirect(route('advertising.index'));
    }

    public function edit( Advertising $advertising, AdvertisingAction $action)
    {
        $route = route('advertising.update', $advertising->id);
        $method = 'PUT';
        $title = "Update Advertising";
        $advertisings = $action->handle();
        $child = Item::find($advertising->child_item_id);
        return view('admin.advertising.create')
            ->with(compact('child',
                'method','advertisings','advertising','title','route'));
    }

    /**
     * @param ClientMenuAction $action
     * @param Request $request
     * @param ClientMenu $clientMenu
     * @return Application|RedirectResponse|Redirector
     */
    public function update(AdvertisingAction $action , UpdateAdvertisingRequest $request, Advertising $advertising)
    {
    $action->update($request, $advertising);

        return redirect(route('advertising.index'));
    }

    public function destroy(Advertising $advertising)
    {
        $advertising->delete();

        return redirect(route('advertising.index'));
    }

    public function fetch(Request $request)
    {
        $value = $request->get('value');
        if ($value == 0)
        {
           $product = Product::all();
        }
        else
        {
            $product = ClientMenu::find($value)->products;
        }

        $output = '<option value="">Select item</option>';
        foreach ($product as $row){
            foreach ($row->items as $item)
            $output.='<option value="'.$item->id.'">'.$item->article.'</option>';
        }
        return $output;
    }

}
