<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductImporterService;

class ProductImporterServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('product-importer', function () {
            return new ProductImporterService();
        });
    }

}
