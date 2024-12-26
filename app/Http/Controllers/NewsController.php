<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $pageInfo = ['title' => 'Новости'];
        return view('news.news', ['pageInfo' => $pageInfo, 'news' => $news]);
    }

    public function create()
    {
        $pageInfo = ['title' => 'Создать новость'];
        return view('news.news-create', ['pageInfo' => $pageInfo]);
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
