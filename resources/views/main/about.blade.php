<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nerth Studio</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto p-4">
        <header class="mb-12">
            <div class="flex justify-center items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/Nerth_black.png') }}" alt="Home Icon">
                </a>
            </div>
        </header>
        <div class="w-full bg-cover bg-center text-center mb-12"
            style="background-image: url('{{ asset('img/about_bg.jpeg') }}')">
            <section class="container mx-auto pt-12">
                <h2 class="text-3xl font-semibold">Welcome to Our World</h2>
                <p class="mt-4">Explore the Best of Us</p>
                <form class="mt-6">
                    <ol>
                        <li>
                            <input type="email" placeholder="Enter your email" class="p-1 border rounded-md">
                        </li>
                        <li class="mt-7">
                            <button type="submit" class="p-2 bg-black text-white rounded-md">Subscribe</button>
                        </li>
                    </ol>
                </form>
            </section>
            <section class="mt-10 flex justify-between mb-12 p-6 rounded-lg bg-stone-900/40 shadow-lg">
                <div>
                    <img class="rounded-full w-32 mt-4 ml-40" src="{{ asset('img/nerth_logo.png') }}" alt="">
                </div>
                <div class="ml-40">
                    <h3 class="text-xl font-semibold text-left text-white">What is Nerth Studio?</h3>
                    <p class="mt-4 mr-96 text-left text-white">
                        Merupakan sebuah brand fashion yang berfokus pada produksi dan pemasaran produk-produk fashion
                        yang eksklusif. Sebagai produk fashion yang bergerak di industri yang sangat dinamis, Nerth
                        Studio sendiri
                        berkomitmen mengembangkan desain-desain inovatif yang mencerminkan tren terkini sambil tetap
                        mempertahankan
                        identitas Nerth Studio itu sendiri. Nerth Studio juga dirancang untuk memenuhi kebutuhan
                        konsumen modern yang stylish. Dengan target
                        pasar yang meliputi anak muda hingga dewasa.
                    </p>
                </div>
            </section>
        </div>
        <section class="text-center mb-12">
            <h2 class="text-2xl font-semibold">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="{{ asset('img/fabian.jpeg') }}" alt="Ahmad Fabiansyah" class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold">As Designer</h3>
                    <p>Ahmad Fabiansyah</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="{{ asset('img/adnin.jpeg') }}" alt="Adnin Farizie Miradi" class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold">As Front-End Programmer</h3>
                    <p>Adnin Farizie Miradi</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="{{ asset('img/fajri.jpeg') }}" alt="Fajri Hafizh" class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold">As Back-End Programmer</h3>
                    <p>Fajri Hafizh</p>
                </div>
            </div>
        </section>
        <section class="flex justify-evenly mb-12">
            <div>
                <h2 class="text-2xl font-semibold">Recent Collection</h2>
                <p class="mt-4">Stay informed with our latest updates</p>
                <a href="">
                    <button class="w-48 mt-6 p-2 bg-black text-white rounded-md">Read More</button>
                </a>
            </div>
            <div class="text-center">
                <img class="mx-auto mb-4" src="{{ asset('img/frame.png') }}" alt="Collection Image">
                <h2 class="text-2xl font-semibold">Collection #1</h2>
                <p>Author: Ahmad Fabiansyah</p>
            </div>
        </section>
        <section class="text-center mb-12">
            <h2 class="text-2xl font-semibold">Social Media Buzz</h2>
            <p class="mt-4">Stay connected with us</p>
            <div class="mt-6 flex justify-center">
                <x-instagram-blockquote
                    permalink="https://www.instagram.com/p/C8D9f3bxcge/?utm_source=ig_embed&amp;utm_campaign=loading">
                </x-instagram-blockquote>
            </div>
        </section>
    </div>
    <footer class="flex justify-center">
        <div class="mx-24">
            <p>© 2024 Nerth Studio. All rights reserved.</p>
        </div>
        <div class="mx-14">
            <p>Privacy Policy</p>
        </div>
        <div>
            <p>Terms of Service</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@vitejs/client"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @vite('resources/js/app.js')
</body>

</html>
