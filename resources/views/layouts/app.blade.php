<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{-- <script defer src="./dist/app.js"></script> --}}
    <script defer src="{{asset('./dist/app.js')}}"></script>
    {{-- <script src="./js/register.js"></script> --}}
    <script src="{{asset('/js/register.js')}}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- flowbite --}}
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    {{--  flowbite-end--}}

    <title>App</title>
    @livewireStyles

</head>
<body class="overflow-y-hidden">
    
    {{ $slot }}

    @livewireScripts
</body>
</html>