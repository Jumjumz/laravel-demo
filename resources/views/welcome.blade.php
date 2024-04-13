<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        @vite('resources/css/normalise.css')
        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class=" w-full h-dvh bg-slate-900 flex flex-col justify-evenly items-center">
        <img class=" fixed w-[100rem] h-[100rem] left-0 object-cover -z-10" src="https://laravel.com/assets/img/welcome/background.svg" />
        @auth
        <h1>WELCOME!!</h1>
        <form action="/logout" method="POST">
            @csrf
            <button>Log Out</button>
        </form>
        @else
        <div class=" w-[50rem] h-[25rem] bg-zinc-700 flex flex-row flex-wrap items-center rounded-3xl">
            <h1 class=" w-full font-mono text-4xl text-black m-0 text-center">Register</h1>
            <div class=" w-full p-8">
                <form action="/register" method="POST" class=" flex flex-col gap-4">
                    @csrf
                    <input name="name" type="text" placeholder="Enter Fullname" class=" w-full h-16 rounded-2xl text-2xl text-center">
                    <input name="email" type="email" placeholder="Enter Email" class=" w-full h-16 rounded-2xl text-2xl text-center">
                    <input name="password" type="password" placeholder="Enter Password" class=" w-full h-16 rounded-2xl text-2xl text-center">
                    <button class=" w-full h-16 bg-blue-700 rounded-2xl text-2xl font-sans text-center font-semibold">Register</button>
                </form>
            </div>
        </div>
        <div class=" w-[50rem] h-[25rem] bg-slate-400 flex flex-row flex-wrap items-center rounded-3xl">
            <h1 class=" w-full font-mono text-4xl text-black m-0 text-center">Log In</h1>
            <div class=" w-full p-8">
                <form action="/login" method="POST" class="flex flex-col gap-4">
                    <input name="login_email" type="email" placeholder="Email" class=" w-full h-16 rounded-2xl text-2xl text-center">
                    <input name="login_password" type="password" placeholder="Password" class=" w-full h-16 rounded-2xl text-2xl text-center">
                    <button class=" w-full h-16 bg-red-400 rounded-2xl text-2xl font-sans text-center font-semibold">Log In</button>
                </form>
            </div>
        </div>
        @endauth
    </body>
</html>
