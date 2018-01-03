<?php
namespace App\Http\Controllers\Map;

use App\Http\Composers\MenuComposer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $list = (new MenuComposer())->getMenu($request->k);
        return View::make('map.index', [
            'list' => $list
        ]);
    }
}