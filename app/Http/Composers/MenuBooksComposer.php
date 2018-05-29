<?php

namespace App\Http\Composers;


class MenuBooksComposer
{
    private $menu;

    public function __construct()
    {
        $this->menu = [
            'mysql' => ['url' => route('books.map', ['k' => 'mysql']), 'child' => self::mySql()],
            'algorithm' => ['url' => route('books.map', ['k' => 'algorithm']), 'child' => self::algorithm()],
            'php' => ['url' => route('books.map', ['k' => 'php']), 'child' => self::php()],
            'linux' => ['url' => route('books.map', ['k' => 'linux']), 'child' => self::linux()],
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
             ['语句','mysql-sentence.md']
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

    public function linux()
    {
        $php = [
            ['centos7', 'linux-centos7.md'],
            ['安装LNMP', 'linux-lnmp.md']
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
