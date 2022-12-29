<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    @vite('resources/css/app.css')
    <script defer src="./dist/app.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<section id="home">
    <div>

        <div class="w-full drop-shadow-xl bg-[#6477DB] border-[1px solid #000000]">
            <div class="container flex items-center h-[74px] justify-between">
                <div class="flex items-center gap-[15px] h-[74px]">
                    <img class="w-[35px]" src="icons/brand.svg" alt="">
                    <img class="h-[25px]" src="icons/line.svg" alt="">
                    <p class="font-bold text-[24px] text-[white] ">Perpustakaan</p>
                </div>
                <div class="flex items-center gap-[10px]">
                    <ul class="flex gap-[20px] text-[white]">
                        <li>
                            <a href="#" class="">Home</a>
                        </li>
                        <li>
                            <a href="#" class="">Contact</a>
                        </li>
                        <li>
                            <a href="#" class="">About</a>
                        </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="bg-[#feddd6]">
        <div class="">
            
            <div class="absolute left-[150px] top-[220px] max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <a href="#">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">ONLINE</h5>
                    <h5 class="text-[50px] font-bold tracking-tight text-gray-900">LIBRARY</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Jika anda orang yang malas baca buku karna kebanyakan main Handphone., Udah saatnya baca buku dimana pun Lewat Apapun..!</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Join Now
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            
        </div>
        <img class="h-[600px] object-right ml-[248px]" src="images/hero1.jpg" alt="">
    </div>
</div>

</section>
</body>
</html>