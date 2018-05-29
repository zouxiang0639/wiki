<?php
namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use View;

class AccountingController extends Controller
{
    public function index()
    {


        return View::make('accounting.index', [
        ]);
    }
}