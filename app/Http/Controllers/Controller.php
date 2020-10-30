<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private array $news = [
        '1' => [
            'id'        => '1',
            'categoryId'  => '1',
            'title'     => 'Заголовок новости 1',
            'shortText' => 'Короткий текст новости 1',
            'text'      => 'Полный текст новости 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1585686023940-92dba62eb5ae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
        ],
        '2' => [
            'id'        => '2',
            'categoryId'  => '1',
            'title'     => 'Заголовок новости 2',
            'shortText' => 'Короткий текст новости 2',
            'text'      => 'Полный текст новости 2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1585686023940-92dba62eb5ae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
        ],
        '3' => [
            'id'        => '3',
            'categoryId'  => '1',
            'title'     => 'Заголовок новости 3',
            'shortText' => 'Короткий текст новости 3',
            'text'      => 'Полный текст новости 3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1585686023940-92dba62eb5ae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
        ],
        '4' => [
            'id'        => '4',
            'categoryId'  => '2',
            'title'     => 'Заголовок новости 4',
            'shortText' => 'Короткий текст новости 4',
            'text'      => 'Полный текст новости 4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1521295121783-8a321d551ad2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
        ],
        '5' => [
            'id'        => '5',
            'categoryId'  => '2',
            'title'     => 'Заголовок новости 5',
            'shortText' => 'Короткий текст новости 5',
            'text'      => 'Полный текст новости 5 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1521295121783-8a321d551ad2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
        ],
        '6' => [
            'id'        => '6',
            'categoryId'  => '2',
            'title'     => 'Заголовок новости 6',
            'shortText' => 'Короткий текст новости 6',
            'text'      => 'Полный текст новости 6 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1521295121783-8a321d551ad2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80',
        ],
        '7' => [
            'id'        => '7',
            'categoryId'  => '3',
            'title'     => 'Заголовок новости 7',
            'shortText' => 'Короткий текст новости 7',
            'text'      => 'Полный текст новости 7 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1055&q=80',
        ],
        '8' => [
            'id'        => '8',
            'categoryId'  => '3',
            'title'     => 'Заголовок новости 8',
            'shortText' => 'Короткий текст новости 8',
            'text'      => 'Полный текст новости 8 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1055&q=80',
        ],
        '9' => [
            'id'        => '9',
            'categoryId'  => '3',
            'title'     => 'Заголовок новости 9',
            'shortText' => 'Короткий текст новости 9',
            'text'      => 'Полный текст новости 9 Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut ducimus eius eligendi laborum laudantium quibusdam quod sapiente! Asperiores eaque eligendi iure iusto necessitatibus odit placeat provident sapiente unde, voluptatum?',
            'photo'     => 'https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1055&q=80',
        ]
    ];

    protected array $categories = [
        '1' => [
            'id'          => '1',
            'name'        => 'Токсичные новости',
            'description' => 'Где то кого то отравили? Значит тут об этом написано.',
            'photo'       => 'https://images.unsplash.com/photo-1588230115883-df1aaae8f9b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80',
        ],
        '2' => [
            'id'          => '2',
            'name'        => 'Горячие новости',
            'description' => 'Всегда есть что то с огоньком.',
            'photo'       => 'https://images.unsplash.com/photo-1587958035263-adb9b85001ec?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=773&q=80',
        ],
        '3' => [
            'id'          => '3',
            'name'        => 'Фэйковые новости',
            'description' => 'Не настоящие, придуманные новости и откровенное враньё.',
            'photo'       => 'https://images.unsplash.com/photo-1585995603666-5bd6b348de9d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2134&q=80',
        ],
    ];

    public function Category()
    {
        return view('category', [
            'categories' => $this->categories,
        ]);
    }

    public function allByCategory($categoryId)
    {
        if (empty($this->categories[$categoryId])) {
            return  redirect('category');
        }

        $category = $this->categories[$categoryId];

        $news = array_filter($this->news, function ($item) use ($categoryId) {
            return $item['categoryId'] == $categoryId;
        });

        return view('category-news', compact('news', 'category'));
    }

    public function newsAll()
    {
        if (empty($this->news)) {
            return  redirect('/');
        }

        $news = $this->news;

        return view('news-all', compact('news'));
    }

    public function newsOne($id)
    {
        if (empty($this->news[$id])) {
            return  redirect('category');
        }

        $news = $this->news[$id];

        return view('news', compact('news'));
    }
}
