@extends('baseView.body')
@section('title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <div class="page-title mt-7">
            <h1 class="text-2xl font-semibold">Дилеры</h1>
            <ul class="breadcrumb text-sm flex items-center mt-2">
                <li><a href="/" class="text-blue-600 hover:text-blue-800 transition-all duration-300">Главная</a>&nbsp;/&nbsp;</li>
                <li>Дилеры</li>
            </ul>
        </div>

        <div class="list-block" id="list-block">
            <div class="search-line flex justify-between items-center">
                <div class="search-block relative w-72 mt-4">
                    <input type="text" name="product-search" class="search border border-gray-400 rounded-md px-4 h-10 w-72 text-sm" placeholder="Поиск">
                    <img src="/img/search.svg" alt="" class="absolute top-2 right-2">
                </div>

                <button class="px-4 bg-blue-600 text-white h-9 rounded hover:bg-blue-800 transition-all duration-300" data-fancybox data-src="#add-client-form">Новый дилер</button>
            </div>

            <div class="table-header flex w-full h-11 items-center bg-blue-600 rounded mt-6">
                <p class="table-header-num w-12 ml-4 text-center text-sm text-white">№ П/П</p>
                <p class="table-header-inn w-24 ml-4 text-center text-sm text-white">ИНН</p>
                <p class="table-header-name w-48 ml-4 text-center text-sm text-white">Название</p>
                <p class="table-header-addr w-56 ml-4 text-center text-sm text-white">Юридический адрес</p>
                <p class="table-header-user-name w-44 ml-4 text-center text-sm text-white">ФИО Контактного лица</p>
                <p class="table-header-phone w-44 ml-4 text-center text-sm text-white">Телефон</p>
            </div>

            <ul class="list">
                @if($dealers)
                    @foreach($dealers as $dealer)
                        <li class="mt-2 relative flex items-center border rounded-md border-gray-300 py-4">
                            <p class="num w-12 ml-4 text-center text-sm">{{$dealer['id']}}</p>
                            <p class="inn w-24 ml-4 text-center text-sm">{{$dealer['inn']}}</p>
                            <p class="name w-48 ml-4 text-center text-sm">{{$dealer['org_name']}}</p>
                            <p class="addr w-56 ml-4 text-center text-sm">{{$dealer['org_addr']}}</p>
                            <p class="user-name w-44 ml-4 text-center text-sm">{{$dealer['name']}}</p>
                            <p class="phone w-44 ml-4 text-center text-sm">{{$dealer['phone']}}</p>

                            @if($dealer['status'])
                                <input type="checkbox" class="ml-3 w-4 h-4" name="" id="" checked>
                            @else
                                <input type="checkbox" class="ml-3 w-4 h-4" name="" id="">
                            @endif


                            <img src="/img/more.svg" alt="" class="more-options ml-10 cursor-pointer">

                            <div class="option-list absolute right-0 top-full mt-1 py-4 px-5 border border-gray-300 rounded bg-white z-10 hidden">
                                <ul>
                                    <li class="text-blue-600 hover:text-blue-800 transition-all cursor-pointer duration-300">
                                        <a href="/dealers/{{$dealer['id']}}">
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

    <div class="add-client-form px-6 py-8 border border-gray-300 rounded-md w-80 hidden" id="add-client-form">
        <h2 class="text-center text-2xl font-semibold">Добавление нового дилера</h2>
        <div class="add-client-form__controls">
            <div class="input-block flex flex-col w-full mt-3">
                <label for="inn" class="text-sm font-semibold">ИНН</label>
                <input type="text" name="inn" id="inn" class="border border-gray-400 mt-2 h-10 rounded px-3" placeholder="4025012510">
            </div>
            <!--/.input-block-->

            <div class="input-block flex flex-col w-full mt-3">
                <label for="company-name" class="text-sm font-semibold">Название</label>
                <input type="text" name="company-name" id="company-name" class="border border-gray-400 mt-2 h-10 rounded px-3" placeholder="ООО НПП МЕТРА">
            </div>
            <!--/.input-block-->

            <div class="input-block flex flex-col w-full mt-3">
                <label for="company-addr" class="text-sm font-semibold">Юр. Адрес</label>
                <input type="text" name="company-addr" id="company-addr" class="border border-gray-400 mt-2 h-10 rounded px-3" placeholder="г. Обнинск ул. Заречная 18В">
            </div>
            <!--/.input-block-->

            <div class="input-block flex flex-col w-full mt-3">
                <label for="contact-name" class="text-sm font-semibold">ФИО Контактного Лица</label>
                <input type="text" name="contact-name" id="contact-name" class="border border-gray-400 mt-2 h-10 rounded px-3" placeholder="Иванов И.И.">
            </div>
            <!--/.input-block-->

            <div class="input-block flex flex-col w-full mt-3">
                <label for="contact-phone" class="text-sm font-semibold">Телефон</label>
                <input type="text" name="contact-phone" id="contact-phone" class="border border-gray-400 mt-2 h-10 rounded px-3" placeholder="+7(999)999-99-99">
            </div>
            <!--/.input-block-->

            <div class="input-block flex flex-col w-full mt-3">
                <label for="contact-mail" class="text-sm font-semibold">Почта</label>
                <input type="text" name="contact-phone" id="contact-mail" class="border border-gray-400 mt-2 h-10 rounded px-3" placeholder="example@example.com">
            </div>
            <!--/.input-block-->
        </div>

        <button class="mt-6 w-full px-4 bg-blue-600 text-white h-9 rounded hover:bg-blue-800 transition-all duration-300">Новый дилер</button>
    </div>
    <script src="/js/list.min.js"></script>
@endsection
