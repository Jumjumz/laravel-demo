<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/normalise.css')
    <title>Edit Page</title>
</head>
<body class=" w-full h-full flex flex-col justify-center items-center bg-black" style="background-color: black">
    <div class=" w-[50rem] h-[59rem] flex flex-col justify-center">
        <h1 class=" w-full text-2xl font-sans font-bold text-white text-center">Edit Post</h1>
        <form action="/edit-post/{{$post->id}}" method="POST" class=" w-full flex flex-col justify-center gap-4">
            @csrf
            @method('PUT')
            <input name="title" type="text" value="{{$post->title}}" class=" w-full h-20 p-4 rounded-xl">
            <textarea name="body" class=" w-full h-28 p-4 rounded-xl">{{$post->body}}</textarea>
            <div class=" w-full h-14 flex justify-center">
                <button class=" w-32 h-full bg-blue-700 text-xl rounded-xl text-white">Save</button>
            </div>
        </form>
    </div>
    
</body>
</html>