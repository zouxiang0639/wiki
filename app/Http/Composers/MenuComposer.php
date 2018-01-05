<?php

namespace App\Http\Composers;

class MenuComposer
{
    private $menu;

    public function __construct()
    {
        $this->menu = [
            'mysql' => self::mySql(),
            'algorithm' => self::algorithm(),
            'php' => self::php()
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
            ['php案例', 'php-case.md']
        ];
        return self::formatBooksRoutes($php);
    }

    private function formatBooksRoutes($routes)
    {
        $menus = [];
        foreach ($routes as $item) {
            $item = array_combine(['title', 'route'], $item);
            $item['route'] = route('books', ['path' => $item['route']]);
            $menus[] = $item;
        }
        return $menus;
    }
}
