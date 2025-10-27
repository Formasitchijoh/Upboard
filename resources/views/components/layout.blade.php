<!Doctype html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <link rel="stylesheet" href="/app.css"></link> --}}
        <title>Pixel Position</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://font.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" 
            rel="stylesheet"
        >
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="bg-[#060606] pb-10 text-white">
        <div class="px-10">
            <nav class="flex justify-between items-center py-4 items-center w-[90%] mx-auto border-b border-white/10">
                <div class="">
                    <a href="" class="">
                        {{-- <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="" class=""> --}}
                    </a>
                </div>
                <div class="space-x-6 font-bold">
                    <a href="#" class="">Jobs</a>
                    <a href="#" class="">Careers</a>
                    <a href="#" class="">Salaries</a>
                    <a href="#" class="">Companies</a>

                </div>
                @auth
                    <div class="space-x-6 flex ">
                        <a href="/jobs/create" class="">Post a Job</a>

                        <form method="POST" action="/logout">
                            @csrf
                            @method('DELETE')

                            <button>Log Out</button>
                        </form>
                    </div>
                @endauth

                @guest
                <a href="/register" class="">SignUp</a>
                <a href="/login" class="">Login</a>
                @endguest

            </nav>
            <main class="">
                {{ $slot }}
            </main>
        </div>
    </body>

</html>