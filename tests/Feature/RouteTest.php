<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testWelcome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        //$response->assertSee('Много разных новостей');
        $response->assertViewIs('welcome');
        $this->view('welcome')->assertSee('Много разных новостей');
    }

    public function testCategory()
    {
        $response = $this->get('/category');
        $response->assertStatus(200);
        $response->assertViewIs('category');
        $response->assertSee('Category page');
    }

    public function testNews()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
        $response->assertViewIs('news-all');
        $response->assertSee('Все новости');
        $response->assertDontSee('Новостей нет.');
    }

    public function testAbout()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertViewIs('about');
        $response->assertSee('О проекте');
    }

    public function testOrder()
    {
        $response = $this->get('/order');
        $response->assertStatus(200);
        $response->assertViewIs('order');
        $response->assertSee('Форма заказа');
    }

    public function testOrderStore()
    {
        $response = $this->post('/order/store');
        $response->assertStatus(200);
        $response->assertViewIs('order');
        $response->assertSee('Заказ успешно отправлен');
    }

    public function testFeedback()
    {
        $response = $this->get('/feedback');
        $response->assertStatus(200);
        $response->assertViewIs('feedback');
        $response->assertSee('Обратная связь');
    }

    public function testFeedbackStore()
    {
        $response = $this->post('/feedback/store');
        $response->assertStatus(200);
        $response->assertViewIs('feedback');
        $response->assertSee('Сообщение успешно отправлено');
    }

    public function testLogin()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login');
        $response->assertSee('Авторизоваться');
    }

    public function testAdminNews()
    {
        $response = $this->get('/admin/news');
        $response->assertStatus(200);
        $response->assertViewIs('admin.news.index');
        $response->assertSee('Адин-панель новостей');
    }
}
