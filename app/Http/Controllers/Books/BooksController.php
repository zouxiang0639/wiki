<?php
namespace App\Http\Controllers\Books;

use App\Consts\Common\MenuConst;
use App\Http\Composers\MenuBooksComposer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use notebook\Notebook;
use View;

class BooksController extends Controller
{
    private $searchArray = [];
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

        if(!empty($request->keyword)) {
            $markdown = str_replace($request->keyword, "<span style='color: red'>{$request->keyword}</span>", $markdown);
        }

        return View::make('books.books', [
            'html' => $markdown
        ]);
    }

    public function search(Request $request)
    {

        $keyword = $request->k;
        $path = Notebook::getPath();
        $this->processExtensions($path);
        $this->searchFileContent($keyword);
        return View::make('books.search', [
            'list' => $this->searchArray
        ]);

    }

    /**
     * Strip languages from extensions
     *
     * @param string $path       path to plugin or template dir
     * @param array  $keep_langs languages to keep
     */
    protected function processExtensions($path, $dir = null)
    {

        $dir_handle = openDir($path);

        while(false !== $file=readDir($dir_handle)) {
            if ($file == '.' || $file == '..' || $file  == '.git') continue;

            if(preg_match('/\.md$/is', $file) ) {
                $this->searchArray[] = [
                    'dir' => $dir,
                    'file' => $file
                ];
            }

            if(is_dir($path . $file)) {
                //是目录
                $this->processExtensions($path.$file.'/',  $dir.$file.'/');
            }

        }

        closeDir($dir_handle);
    }

    private function searchFileContent($keyword)
    {

        foreach ($this->searchArray as $key =>$file) {
            $path = Notebook::getPath($file['dir'].$file['file']);

            $content = file_get_contents($path);

            if(strstr($content, $keyword) == false) {

                unset($this->searchArray[$key]);
                continue;
            }
            $content = str_replace(array(" ", "\n"), "", $content);
            $this->searchArray[$key]['content'] = mb_substr($content, 0, 100);
            $this->searchArray[$key]['path'] = strtr($file['dir'].$file['file'] , '/', '-');

        }
    }

    public function map(Request $request)
    {
        $list = (new MenuBooksComposer())->getMenu($request->k);
        return View::make('books.map', [
            'list' => $list['child']
        ]);
    }
}