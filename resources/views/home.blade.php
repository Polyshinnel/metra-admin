@extends('baseView.body')
@section('title', $pageInfo['title'])

@section('content')
    <div class="page-title mt-7">
        <h1 class="text-2xl font-semibold">Быстрый доступ</h1>

        <div class="dashboard-bnts flex flex-wrap -ml-10 mt-8">
            <a href="/dealers" class="flex mt-4 ml-10">
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

            <a href="/notifications" class="flex mt-4 ml-10">
                <div class="dashboard-bnt w-64 h-44 flex items-center justify-center flex-col bg-blue-50 rounded hover:bg-blue-100 transition-all duration-300">
                    <img src="/img/admin/dashboard/notifications.svg" alt="">
                    <p class="text-lg mt-2 text-center font-semibold">Оповещения</p>
                </div>
            </a>
        </div>
    </div>

    <div class="dashboard-counts mt-8">
        <h2 class="text-2xl font-semibold">Статистика</h2>
        <div class="dashboard-counts__wrapper flex flex-wrap -ml-10 mt-4">
            <div class="dashboard-count bg-blue-50 p-4 rounded w-64 ml-10">
                <div class="dashboard-count__title">
                    <p class="font-semibold text-xs">Поситителей в сутки</p>
                </div>

                <div class="dashboard-count__counts flex mt-4 justify-between items-center">
                    <span class="font-semibold text-2xl">0</span>
                    <div class="dashboard-count__count-percent">
                        <p class="text-sm">0%</p>
                    </div>
                </div>
            </div>

            <div class="dashboard-count bg-blue-50 p-4 rounded w-64 ml-10">
                <div class="dashboard-count__title">
                    <p class="font-semibold text-xs">Скачано ТКП</p>
                </div>

                <div class="dashboard-count__counts flex mt-4 justify-between items-center">
                    <span class="font-semibold text-2xl">0</span>
                    <div class="dashboard-count__count-percent">
                        <p class="text-sm">0%</p>
                    </div>
                </div>
            </div>

            <div class="dashboard-count bg-blue-50 p-4 rounded w-64 ml-10">
                <div class="dashboard-count__title">
                    <p class="font-semibold text-xs">Активных диллеров</p>
                </div>

                <div class="dashboard-count__counts flex mt-4 justify-between items-center">
                    <span class="font-semibold text-2xl">0</span>
                    <div class="dashboard-count__count-percent">
                        <p class="text-sm">0%</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="charts-block mt-8">
        <h2 class="text-2xl font-semibold">Графики</h2>

        <canvas id="myChart" class="w-full mt-5" style="height: 300px;"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Январь', 'Февраль', "Март", "Апрель", "Май", "Июнь", "Июль"],
                datasets: [
                    {
                        label: 'Количество посетителей',
                        data: [0, 0, 0, 0, 0, 0, 0],
                        fill: false,
                        borderColor: 'rgb(255, 0, 0)',
                        tension: 0.1
                    },
                    {
                        label: 'Скачано ТКП',
                        data: [0, 0, 0, 0, 0, 0, 0],
                        fill: false,
                        borderColor: 'rgb(0, 255, 0)',
                        tension: 0.1
                    },
                    {
                        label: 'Активных диллеров',
                        data: [0, 0, 0, 0, 0, 0, 0],
                        fill: false,
                        borderColor: 'rgb(0, 0, 255)',
                        tension: 0.1
                    },
                ]
            },
        });
    </script>
@endsection
