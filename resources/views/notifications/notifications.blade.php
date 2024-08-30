@extends('baseView.body')
@section('title', $pageInfo['title'])

@section('content')
    <div class="page-title mt-7">
        <h1 class="text-2xl font-semibold">Уведомления</h1>
        <ul class="breadcrumb text-sm flex items-center mt-2">
            <li><a href="/" class="text-blue-600 hover:text-blue-800 transition-all duration-300">Главная</a>&nbsp;/&nbsp;</li>
            <li>Уведомления</li>
        </ul>
    </div>

    <div class="notification-wrapper">
        @if($notifications)

            @foreach($notifications as $notification)
                @if(!$notification['publish_status'])
                    <div class="notification-item flex items-start py-4 px-5 border rounded-lg border-gray-400 mt-5">
                        <div class="notification-item__img w-12 h-12 flex items-center justify-center rounded-full bg-blue-700 mt-1">
                            @if($nofification['notification_type'] == '1')
                                <img src="/img/bell.svg" alt="">
                            @else
                                <img src="/img/alert.svg" alt="">
                            @endif

                        </div>
                        <div class="notification-item__info ml-10 w-3/4">
                            <div class="notification-item__text">
                                <h3 class="text-base font-medium">{{$notification['notification_title']}}</h3>
                                <p class="text-sm mt-2">{{$notification['notification_text']}}</p>
                            </div>
                            <p class="notification-date text-gray-400 text-xs mt-1">Опубликовано: {{$notification['date_publish']}}</p>
                        </div>
                    </div>
                @else
                    <div class="notification-item flex items-start py-4 px-5 border rounded-lg border-gray-400 mt-8 bg-blue-50">
                        <div class="notification-item__img w-12 h-12 flex items-center justify-center rounded-full bg-blue-700 mt-1">
                            @if($nofification['notification_type'] == '1')
                                <img src="/img/bell.svg" alt="">
                            @else
                                <img src="/img/alert.svg" alt="">
                            @endif
                        </div>
                        <div class="notification-item__info ml-10 w-3/4">
                            <div class="notification-item__text">
                                <h3 class="text-base font-medium">{{$notification['notification_title']}}</h3>
                                <p class="text-sm mt-2">{{$notification['notification_text']}}</p>
                                <div class="publish-list flex items-center mt-1">
                                    <p class="publish-notification text-blue-600 cursor-pointer text-blue-600 hover:text-blue-800 transition-all duration-300">Опубликовать</p>

                                    <p class="delete-notification ml-8 text-red-600 cursor-pointer hover:text-red-800 transition-all duration-300">Удалить</p>
                                </div>

                            </div>
                            <p class="notification-date text-gray-400 text-xs mt-1">Создано: {{$notification['notification_text']}}</p>
                        </div>
                    </div>
                @endif
            @endforeach
            <button class="mt-8 px-4 bg-blue-600 text-white h-9 rounded hover:bg-blue-800 transition-all duration-300" data-fancybox data-src="#add-notification-form">Новое оповещение</button>
        @else
            <div class="notification-empty mt-8">
                <h2 class="text-lg font-light">На данный момент уведомления отсутствуют!</h2>
                <a href="/"><button class="bg-blue-600 text-white rounded py-2 px-4 mt-5">На главную</button></a>
            </div>

            <button class="mt-8 px-4 bg-blue-600 text-white h-9 rounded hover:bg-blue-800 transition-all duration-300" data-fancybox data-src="#add-notification-form">Новое оповещение</button>
        @endif
    </div>

    <form action="" id="add-notification-form" class="px-6 py-8 border border-gray-300 rounded-md w-80 hidden">
        <h2 class="text-center text-2xl font-semibold">Новое оповещение</h2>

        <div class="add-client-form__controls">
            <div class="input-block flex flex-col w-full mt-3">
                <label for="type-notification" class="text-sm font-semibold">Тип оповещения</label>
                <select name="type-notification" id="type-notification" class="border border-gray-400 mt-2 h-10 rounded px-3">
                    <option value="1">Информация</option>
                    <option value="2">Оповещение</option>
                </select>
            </div>
            <!--/.input-block-->

            <div class="input-block flex flex-col w-full mt-3">
                <label for="notification-title" class="text-sm font-semibold">Заголовок оповещения</label>
                <input type="text" name="notification-title" id="notification-title" class="border border-gray-400 mt-2 h-10 rounded px-3" placeholder="Новое оповещение">
            </div>
            <!--/.input-block-->

            <div class="input-block flex flex-col w-full mt-3">
                <label for="notification-text" class="text-sm font-semibold">Текст оповещения</label>
                <textarea name="notification-text" id="notification-text" class="border border-gray-400 mt-2 p-3 h-24 rounded text-sm" placeholder="Информация для диллеров"></textarea>
            </div>
            <!--/.input-block-->
        </div>

        <button class="mt-6 w-full px-4 bg-blue-600 text-white h-9 rounded hover:bg-blue-800 transition-all duration-300">Новое оповещение</button>
    </form>
@endsection
