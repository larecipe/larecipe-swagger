<?php

namespace Binarytorch\LarecipeSwagger;

use BinaryTorch\LaRecipe\LaRecipe;
use Illuminate\Support\ServiceProvider;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        LaRecipe::script('larecipe-swagger', __DIR__.'/../dist/js/asset.js');
        LaRecipe::style('larecipe-swagger', __DIR__.'/../dist/css/asset.css');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
