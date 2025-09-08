<!doctype html>
<html lang="en">
<head>
    <title>{{ $item->title }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-menu/> 
    <div class="mx-auto max-w-2xl">
        <h1>{{ $item->title }}</h1>
        <p>{{ $item->description }}</p>
        {!! $item->renderBlocks() !!}
    </div>
</body>
</html>
