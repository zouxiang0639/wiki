<?php
namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use notebook\Notebook;
use View;

class BooksController extends Controller
{
    public function index(Request $request)
    {

        $path = strtr($request->path,'-', '/');
        $storagePath = Notebook::getPath($path);
        if(!file_exists($storagePath)){
            abort(403,'对不起，没有这个文件');
        }
        $markdown = file_get_contents($storagePath);

        $parser = new \cebe\markdown\GithubMarkdown();
        $markdown = $parser->parse($markdown);

        return View::make('index.books', [
            'html' => $markdown
        ]);
    }
}