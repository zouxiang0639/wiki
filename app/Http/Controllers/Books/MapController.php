<?php
namespace App\Http\Controllers\Books;

use App\Http\Composers\MenuBooksComposer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $list = (new MenuBooksComposer())->getMenu($request->k);
        return View::make('books.map', [
            'list' => $list
        ]);
    }
}