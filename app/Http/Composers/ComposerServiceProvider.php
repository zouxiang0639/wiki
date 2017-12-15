<?php

namespace App\Http\Composers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

/**
 * Composer服务提供类
 * @author sky
 * Date 2017年5月2日
 */
class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('*', 'App\Http\Composers\LayoutComposer');
    }

    public function register()
    {

    }
}
