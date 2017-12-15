<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use View;

class IndexController extends Controller
{
    public function index()
    {
        return View::make('index.index', [

        ]);
    }
}