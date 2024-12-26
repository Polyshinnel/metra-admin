@extends('baseView.body')
@section('title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <div class="page-title mt-7">
            <h1 class="text-2xl font-semibold">Сертификаты</h1>
            <ul class="breadcrumb text-sm flex items-center mt-2">
                <li><a href="/" class="text-blue-600 hover:text-blue-800 transition-all duration-300">Главная</a>&nbsp;/&nbsp;</li>
                <li>Сертификаты</li>
            </ul>
        </div>

        <div class="list-block" id="list-block">
            <div class="search-line flex justify-between items-center">
                <div class="search-block relative w-72 mt-4">
                    <input type="text" name="product-search" class="search border border-gray-400 rounded-md px-4 h-10 w-72 text-sm" placeholder="Поиск">
                    <img src="/img/search.svg" alt="" class="absolute top-2 right-2">
                </div>

                <a href="/news/create"><button class="px-4 bg-blue-600 text-white h-9 rounded hover:bg-blue-800 transition-all duration-300">Создать новость</button></a>
            </div>

            <div class="table-header flex w-full h-11 items-center bg-blue-600 rounded mt-6">
                <p class="table-header-num w-12 ml-4 text-center text-sm text-white">№ П/П</p>
                <p class="table-header-name w-48 ml-4 text-center text-sm text-white">Название</p>
            </div>

            <ul class="list">
                @if($certificates)
                    @foreach($certificates as $certificates_item)
                        <li class="mt-2 relative flex items-center border rounded-md border-gray-300 py-4">
                            <p class="num w-12 ml-4 text-center text-sm">{{$certificates_item['id']}}</p>
                            <p class="name w-48 ml-4 text-center text-sm">{{$certificates_item['name']}}</p>

                            <img src="/img/more.svg" alt="" class="more-options ml-10 cursor-pointer">

                            <div class="option-list absolute right-0 top-full mt-1 py-4 px-5 border border-gray-300 rounded bg-white z-10 hidden">
                                <ul>
                                    <li class="text-blue-600 hover:text-blue-800 transition-all cursor-pointer duration-300">
                                        <a href="/faq/{{$certificates_item['id']}}">
                                            Просмотр
                                        </a>
                                    </li>
                                    <li class="text-red-500 hover:text-red-800 transition-all cursor-pointer duration-300 mt-1">Удалить</li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>

            <div class="pagination-block mt-10 flex justify-center">
                <ul class="pagination pagination_mod flex flex-wrap items-center -ml-2"></ul>
            </div>
        </div>
    </div>
    <script src="/js/list.min.js"></script>
@endsection
