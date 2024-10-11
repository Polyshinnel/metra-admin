<header class="w-full h-20 metra-color flex items-center relative">
    <div class="box-container relative">
        <div class="header__wrapper flex justify-between items-center">
            <div class="header-logo">
                <a href="/">
                    <img src="/img/logo-w.svg" alt="">
                </a>
            </div>

            <nav>
                <ul class="flex space-x-10 text-white text-base">
                    <li><a href="/catalog" class="hover:text-gray-300 transition-all duration-300">Каталог</a></li>
                    <li><a href="/news" class="hover:text-gray-300 transition-all duration-300">Новости</a></li>
                    <li><a href="/academy" class="hover:text-gray-300 transition-all duration-300">Академия Метра</a></li>
                    <li><a href="/add-materials" class="hover:text-gray-300 transition-all duration-300">Доп. материалы</a></li>
                    <li><a href="/tkp-construct" class="hover:text-gray-300 transition-all duration-300">Конструктор ТКП</a></li>
                </ul>
            </nav>

            <div class="menu-btn border-white p-2 border rounded cursor-pointer">
                <img src="/img/menu.svg" alt="">
            </div>
        </div>

        <div class="header-menu absolute top-20 right-0 bg-white border border-gray-500 rounded p-6 z-50 hidden">
            <ul class="space-y-2 text-sm">
                <li><a href="/notification" class="flex items-center hover:text-blue-600 transition-all duration-300">Оповещения <div class="notification-round"><p>0</p></div></a></li>
                <li><a href="/profile" class="hover:text-blue-600 transition-all duration-300">Профиль</a></li>
                <li><a href="https://t.me/MetraGroupBot" class="hover:text-blue-600 transition-all duration-300">Телеграм</a></li>
            </ul>

            <div class="header-menu__user mt-4">
                <img src="/img/user.svg" alt="">
                <div class="header-menu__user-text">
                    <h2 class="text-xs">Нестеров Андрей</h2>
                    <p class="exit-btn text-xs text-blue-600 cursor-pointer hover:text-blue-800 transition-all duration-300">Выйти</p>
                </div>
            </div>
        </div>
    </div>
</header>
