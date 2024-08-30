@extends('baseView.body')
@section('title', $pageInfo['title'])

@section('content')
    <div class="page-title mt-7">
        <h1 class="text-2xl font-semibold">Быстрый доступ</h1>

        <div class="dashboard-bnts flex flex-wrap -ml-10 mt-8">
            <a href="#" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/dealers.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">Диллеры</p>
                </div>
            </a>

            <a href="#" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/tkp.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">ТКП</p>
                </div>
            </a>

            <a href="#" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/news.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">Новости</p>
                </div>
            </a>

            <a href="#" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/vebinars.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">Вебинары</p>
                </div>
            </a>

            <a href="#" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/faq.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">F.A.Q</p>
                </div>
            </a>

            <a href="#" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/instructions.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">Видеоинструкции</p>
                </div>
            </a>

            <a href="#" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/sertificates.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">Сертификаты</p>
                </div>
            </a>

            <a href="#" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/notifications.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">Оповещения</p>
                </div>
            </a>
        </div>
    </div>
@endsection
