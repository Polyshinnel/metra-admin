@extends('baseView.body')
@section('title', $pageInfo['title'])

@section('content')
    <div class="page-title mt-7">
        <h1 class="text-2xl font-semibold">{{$pageInfo['title']}}</h1>
        <ul class="breadcrumb text-sm flex items-center mt-2">
            <li><a href="/" class="text-blue-600 hover:text-blue-800 transition-all duration-300">Главная</a>&nbsp;/&nbsp;</li>
            <li><a href="/dealers" class="text-blue-600 hover:text-blue-800 transition-all duration-300">Диллеры</a>&nbsp;/&nbsp;</li>
            <li>{{$pageInfo['title']}}</li>
        </ul>
    </div>

    <div class="dealer-card mt-10 rounded-md bg-blue-50 p-6">
        <div class="user-line flex items-center">
            <div class="user-icon flex items-center justify-center w-12 h-12 rounded-full bg-blue-100">
                <img src="/img/admin/dealers/user.svg" alt="">
            </div>

            <p class="ml-4 text-base font-semibold">{{$dealer_info['name']}}</p>

            @if($dealer_info['country'] == 'ru')
                <img class="ml-4" src="/img/admin/dealers/flags/ru.png" alt="">
            @elseif($dealer_info['country'] == 'kz')
                <img class="ml-4" src="/img/admin/dealers/flags/kz.png" alt="">
            @elseif($dealer_info['country'] == 'be')
                <img class="ml-4" src="/img/admin/dealers/flags/be.png" alt="">
            @endif

        </div>

        <div class="user-line__info flex mt-6">
            <div class="user-line__info__item flex items-center">
                <img src="/img/admin/dealers/geo.svg" alt="">
                <p class="ml-2">{{$dealer_info['org_addr']}}</p>
            </div>

            <div class="user-line__info__item flex items-center ml-8">
                <img src="/img/admin/dealers/email.svg" alt="">
                <p class="ml-2">{{$dealer_info['mail']}}</p>
            </div>

            <div class="user-line__info__item flex items-center ml-8">
                <img src="/img/admin/dealers/phone.svg" alt="">
                <p class="ml-2">{{$dealer_info['phone']}}</p>
            </div>
        </div>

        <div class="user-line__info mt-3 flex items-center">
            <div class="user-line__info__item">
                <p>ИНН: {{$dealer_info['inn']}}</p>
            </div>

            <div class="user-line__info__item ml-8">
                <p>Наименование: {{$dealer_info['org_addr']}}</p>
            </div>
        </div>

        <div class="user-line__statistics flex mt-6">
            <div class="user-line__statistics__item flex flex-col items-center">
                <p class="text-xs">Клиентов</p>
                <span class="flex mt-1 font-semibold text-xl">{{$client_count}}</span>
            </div>

            <div class="user-line__statistics__item flex flex-col items-center ml-14">
                <p class="text-xs">Дата регистрации</p>
                <span class="flex mt-1 font-semibold text-xl">20.01.2024</span>
            </div>

            <div class="user-line__statistics__item flex flex-col items-center ml-14">
                <p class="text-xs">Последний вход</p>
                <span class="flex mt-1 font-semibold text-xl">30.08.2024</span>
            </div>
        </div>
    </div>

    <h2 class="text-xl font-semibold mt-16">Клиенты диллера</h2>

    <div class="list-block" id="list-block">
        <div class="search-line flex justify-between items-center">
            <div class="search-block relative w-72 mt-4">
                <input type="text" name="product-search" class="search border border-gray-400 rounded-md px-4 h-10 w-72 text-sm" placeholder="Поиск">
                <img src="/img/search.svg" alt="" class="absolute top-2 right-2">
            </div>
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
            @if($clients)
                @foreach($clients as $client)
                    <li class="mt-2 relative flex items-center border rounded-md border-gray-300 py-4">
                        <p class="num w-12 ml-4 text-center text-sm">{{$client['id']}}</p>
                        <p class="inn w-24 ml-4 text-center text-sm">{{$client['inn']}}</p>
                        <p class="name w-48 ml-4 text-center text-sm">{{$client['name']}}</p>
                        <p class="addr w-56 ml-4 text-center text-sm">{{$client['address']}}</p>
                        <p class="user-name w-44 ml-4 text-center text-sm">{{$client['contact_name']}}</p>
                        <p class="phone w-44 ml-4 text-center text-sm">{{$client['phone']}}</p>
                    </li>
                @endforeach
            @endif

        </ul>

        <div class="pagination-block mt-10 flex justify-center">
            <ul class="pagination pagination_mod flex flex-wrap items-center -ml-2"></ul>
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
    </div>

    <script src="/js/list.min.js"></script>
    <script>
        let monkeyList = new List('list-block', {
            valueNames: ['name', 'inn', 'phone','user-name', 'addr'],
            page: 15,
            pagination: true
        });
    </script>
@endsection
