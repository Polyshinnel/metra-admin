<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>ЛК Метра | Авторизация</title>
</head>
<body>
<div class="form-wrapper w-full h-full absolute top-0 left-0 flex justify-center items-center">
    <form action="/telegram-auth" method="post" class="auth flex flex-col justify-center items-center w-72 m-auto">
        <img src="/img/logo-b.svg" alt="" class="auth-logo w-48">
        <div class="input-block flex flex-col w-72 mt-7">
            <label for="login" class="text-sm font-semibold">Почта</label>
            <input type="text" name="email" id="login" class="border border-gray-400 mt-1 h-10 rounded px-3" placeholder="example@example.com" autocomplete="username">
        </div>
        <!--/.input-block-->
        <div class="input-block flex flex-col w-72 mt-3 relative">
            <label for="password" class="text-sm font-semibold">Пароль</label>
            <input type="password" name="password" id="password" class="border border-gray-400 mt-1 h-10 rounded px-3" placeholder="*****" autocomplete="current-password">
            <img src="/img/eye.svg" alt="" class="absolute w-5 right-3 top-8 cursor-pointer display-pass">
        </div>
        <!--/.input-block-->
        <div class="form-flex flex mt-6 justify-between w-full items-center">
            <input type="submit" value="Войти" class="px-4 bg-blue-600 text-white h-9 rounded hover:bg-blue-800 transition-all duration-300 cursor-pointer">
            <a href="#" class="text-blue-600 font-semibold transition-all duration-300 hover:text-blue-800">Забыли пароль</a>
        </div>

        @if($hasErr)
            <p class="mt-5 text-center text-red-600">Ошибка авторизации, неверный логин и/или пароль!</p>
        @endif
        <input type="hidden" name="telegram_id" id="telegram_id">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/js/owl-carousel/owl.carousel.min.js"></script>
<script src="/js/main.js"></script>
<script src="https://telegram.org/js/telegram-web-app.js"></script>
<script>
    let tg = window.Telegram.WebApp;
    let tgUserId = String(tg.initDataUnsafe.user.id)
    document.getElementById('telegram_id').value = tgUserId
</script>
</body>
</html>
