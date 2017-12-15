<?php

namespace App\Http\Composers;

class LayoutComposer
{
    public function compose($view)
    {
        $layout = config('views.layout', 'layouts.master');

        $view->with(compact('layout'));
    }
}
