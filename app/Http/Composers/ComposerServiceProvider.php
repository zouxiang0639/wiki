<?php

namespace App\Http\Composers;

use App\Consts\Common\MenuConst;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

/**
 * Composer服务提供类
 * @author zouxiang
 * Date 2017年5月2日
 */
class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('*', 'App\Http\Composers\LayoutComposer');
        View::composer('books.*', 'App\Http\Composers\MenuBooksComposer');
        View::composer('accounting.*', 'App\Http\Composers\MenuAccountingComposer');
        //self::menu();
    }

    public function register()
    {

    }

}
