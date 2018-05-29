<?php

namespace App\Http\Composers;

use App\Consts\Common\MenuConst;

class MenuAccountingComposer
{
    private $menu;

    public function __construct()
    {
        $this->menu = [
            '账单' => ['url' => route('accounting')],
        ];
    }

    public function compose($view)
    {
        $view->with(['menu' => $this->menu]);
    }
    public function getMenu($name)
    {
        return array_get($this->menu, $name);
    }

    public function mySql()
    {
        $mysql = [
             ['abc','mysql-readme.md']
        ];

        return self::formatBooksRoutes($mysql);
    }

    public function algorithm()
    {
        $algorithm = [
            ['约瑟夫环算法', 'algorithm-Joseph_circle.md']
        ];
        return self::formatBooksRoutes($algorithm);
    }

    public function php()
    {
        $php = [
            ['php函数', 'php-function.md'],
            ['php案例', 'php-case.md'],
            ['书籍案例', 'php-book.md'],

        ];
        return self::formatBooksRoutes($php);
    }

    private function formatBooksRoutes($routes)
    {
        $menus = [];
        foreach ($routes as $item) {
            $item = array_combine(['title', 'route'], $item);
            $item['route'] = route('books', ['path' => $item['route'], 'menu' => MenuConst::BOOKS]);
            $menus[] = $item;
        }
        return $menus;
    }
}
