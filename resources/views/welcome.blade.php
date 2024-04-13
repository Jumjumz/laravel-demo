<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        @vite('resources/css/normalise.css')
        <title>Laravel-Demo</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class=" w-full h-dvh bg-slate-900 flex flex-col justify-evenly items-center">
        <img class=" fixed w-[100rem] h-[100rem] left-0 object-cover -z-10" src="https://laravel.com/assets/img/welcome/background.svg" />
        @auth
        <div class=" relative">
            <form action="/logout" method="POST">
                @csrf
                <button class=" w-32 h-10 bg-white rounded-2xl font-mono text-xl text-black/70">Log Out</button>
            </form>
        </div>
        <div class=" w-[100rem] h-[30rem] flex flex-col justify-evenly items-center">
            <h1 class=" text-white">Write Post</h1>
            <div class=" w-full h-[50rem] flex flex-col flex-wrap items-center">
                <form action="/create-post" method="POST" class=" w-full h-[30rem] flex flex-col items-center gap-5">
                    @csrf
                    <input name="title" type="text" placeholder="Title" class=" w-full h-14 text-xl text-black/70 pl-4 rounded-xl">
                    <textarea name="body" placeholder="Post" class=" w-full h-60 font-sans text-xl text-black/90 p-2 rounded-2xl"></textarea>
                    <div class=" w-full h-12 flex justify-center">
                        <button class=" w-56 h-full text-white text-xl font-sans rounded-xl bg-red-700">Post</button>
                    </div>
                </form>
            </div>
        </div>
        <div class=" w-[100rem] h-[50rem] flex flex-col items-center gap-4">
            <h1 class=" text-center text-white text-4xl font-sans">Posts</h1>
            @foreach ($posts as $post)
            <div class=" w-full h-36 p-4 bg-slate-400 flex flex-col items-center gap-6 rounded-xl">
                <h1 class="m-0 font-bold border-b-2 border-slate-900">{{$post['title']}}</h1>
                <p class=" text-xl text-black/80">{{$post['body']}}</p>
            </div>
                
            @endforeach
        </div>
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
                    @csrf
                    <input name="login_email" type="email" placeholder="Email" class=" w-full h-16 rounded-2xl text-2xl text-center">
                    <input name="login_password" type="password" placeholder="Password" class=" w-full h-16 rounded-2xl text-2xl text-center">
                    <button class=" w-full h-16 bg-red-400 rounded-2xl text-2xl font-sans text-center font-semibold">Log In</button>
                </form>
            </div>
        </div>
        @endauth
    </body>
</html>
