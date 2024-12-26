@extends('baseView.body')
@section('title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <div class="page-title mt-7">
            <h1 class="text-2xl font-semibold">Создать новость</h1>
            <ul class="breadcrumb text-sm flex items-center mt-2">
                <li><a href="/" class="text-blue-600 hover:text-blue-800 transition-all duration-300">Главная</a>&nbsp;/&nbsp;</li>
                <li><a href="/news" class="text-blue-600 hover:text-blue-800 transition-all duration-300">Новости</a>&nbsp;/&nbsp;</li>
                <li>Создать новость</li>
            </ul>
        </div>

        <div class="news-create-el mt-5">
            <div class="element"></div>
        </div>
    </div>

    <script type="module">
        import { Editor } from 'https://esm.sh/@tiptap/core'
        import StarterKit from 'https://esm.sh/@tiptap/starter-kit'
        const editor = new Editor({
            element: document.querySelector('.element'),
            extensions: [StarterKit],
            content: '<p>Hello World!</p>',
        })
    </script>
@endsection
