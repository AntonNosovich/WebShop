<?php

namespace App\Providers;

use App\Repositories\ClientMenuRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            /**
             * @var ClientMenuRepository $repository
             */
            $repository = app(ClientMenuRepository::class);
            $view->with(['tools' =>$repository->get()]);
        });
        View::composer(['admin.item.create','admin.product.index'], function($view) {
            /**
             * @var ProductRepository $repository
             */
            $repository = app(ProductRepository::class);
            $view->with(['productShow' =>$repository->get()]);
        });
    }
}
