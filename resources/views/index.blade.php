<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nerth Studio</title>
    <link rel="shortcut icon" href="favicon.ico" type="img/logo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-cover bg-center h-screen flex flex-col" style="background-image: url('/img/background.png');">

    <div class="container mx-auto flex-grow">

        <header>
            <!-- Navigation -->
            <nav class="flex justify-between my-8">
                <div class="login">
                    @auth
                        <button class="font-medium text-xl px-5 py-2.5" type="button" data-modal-target="logout-modal"
                            data-modal-toggle="logout-modal">
                            <p class="text-outline">
                                Welcome, {{ Auth::user()->first_name }}
                                @if (Auth::user()->hasRole('admin'))
                                    (admin)
                                @endif
                            </p>
                        </button>
                    @else
                        <button class="font-medium text-xl px-5 py-2.5" type="button"
                            data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
                            <p class="text-outline">LOGIN</p>
                        </button>
                    @endauth
                </div>
                <div class="cart">
                    <button class="font-medium text-xl px-5 py-2.5" type="button" data-drawer-target="drawer-right"
                        data-drawer-show="drawer-right" data-drawer-placement="right" aria-controls="drawer-right">
                        <p class="text-outline">
                            CART (<span id="cart-count">0</span>)
                        </p>
                    </button>
                    <!-- Cart Details -->
                    <div id="drawer-right"
                        class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-96"
                        tabindex="-1" aria-labelledby="drawer-right-label">
                        <div class="flex justify-between my-5">
                            <button type="button" data-drawer-hide="drawer-right" aria-controls="drawer-right"
                                class="mb-4">
                                <h5 class="text-base font-semibold text-gray-500">CLOSE</h5>
                                <span class="sr-only">Close</span>
                            </button>
                            <h5 id="drawer-right-label" class="text-base font-semibold text-gray-500">CART (<span
                                    id="drawer-cart-count">0</span>)</h5>
                        </div>
                        <div id="cart-items" class="space-y-4">
                            <!-- Cart items will be dynamically added here -->
                        </div>
                        <div class="my-4 text-right">
                            <span class="text-xl font-bold">Total: Idr. <span id="total-price">0</span></span>
                        </div>
                        <div class="text-center">
                            <button type="button" href="{{ route('cart') }}" class="bg-black py-4 px-10 rounded">
                                <h5 class="text-base font-semibold text-white">CHECK OUT</h5>
                            </button>
                        </div>
                        <div
                            class="mt-8 rounded-lg py-3 px-3 flex flex-row gap-x-2 justify-evenly bg-gray-300 items-center">
                            <a href="https://shopee.co.id/shop/794956777?is_from_login=true">
                                <img src="{{ asset('img/shope.png') }}" alt="Shopee Logo" class="w-12 h-12">
                            </a>
                            <h1 class="text-xl font-bold text-gray-800">or</h1>
                            <a href="https://tokopedia.com">
                                <img src="{{ asset('img/tokopedia.png') }}" alt="Tokopedia Logo" class="w-12 h-12">
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Login Form Modal -->
            <section>
                @auth
                    <div id="logout-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="p-4 md:p-5 text-center">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="font-medium text-xl px-5 py-2.5 mb-2 bg-red-500 text-white rounded">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-lg max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-xl font-semibold text-gray-900">Login To Your Account</h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="authentication-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form method="POST" action="{{ route('customer.login') }}" class="space-y-4">
                                        @csrf
                                        <div>
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="name@mail.com" required />
                                        </div>
                                        <div>
                                            <div class="flex justify-between">
                                                <label for="password"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}"
                                                        class="text-sm text-blue-700 hover:underline">Forgot?</a>
                                                @endif
                                            </div>
                                            <input type="password" name="password" id="password" placeholder="••••••••"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required />
                                        </div>
                                        <button type="submit"
                                            class="w-full text-white bg-stone-700 hover:bg-stone-800 focus:ring-4 focus:outline-none focus:ring-stone-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login
                                            Now</button>
                                        <div class="text-sm font-medium text-gray-500">
                                            Not registered? <a href="{{ route('customer.register') }}"
                                                class="text-blue-700 hover:underline">Create account</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </section>

            <section class="flex justify-center my-8">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="logo">
                </a>
            </section>
        </header>

        <section class="product flex justify-around my-8">
            <!-- Collection Buttons -->
            <div class="collection1">
                <a href="{{ route('product', ['slug' => 'hope']) }}">
                    <button type="button"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 size-5 hover:scale-125 transition-transform duration-500 rounded-full"></button>
                </a>
            </div>

            <div class="collection2">
                <a href="{{ route('product', ['slug' => 'scrf']) }}">
                    <button type="button"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 size-5 hover:scale-125 transition-transform duration-500 rounded-full"></button>
                </a>
            </div>

            <div class="collection3">
                <a href="{{ route('product', ['slug' => 'fbdr']) }}">
                    <button type="button"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 size-5 hover:scale-125 transition-transform duration-500 rounded-full"></button>
                </a>
            </div>
        </section>

    </div>

    <!-- Footer -->
    <footer class="my-8 mt-auto">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('about') }}">
                <p class="text-outline font-medium text-xl px-5 py-2.5">EXTRAS</p>
            </a>
            <a href="https://wa.me/087723050090" target="_blank">
                <p class="text-outline font-medium text-xl px-5 py-2.5">CUSTOMER SERVICE</p>
            </a>
            <button type="button" data-modal-target="authentication-social"
                data-modal-toggle="authentication-social">
                <p class="text-outline font-medium text-xl px-5 py-2.5">SOCIAL</p>
            </button>
        </div>
        <div id="authentication-social" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full bg-black/10">
            <div class="instagram">
                <a href="https://www.instagram.com/nerth.studio/" target="_blank">
                    <img src="{{ asset('img/INSTAGRAM.PNG') }}" alt="">
                </a>
            </div>
            <div class="tiktok">
                <a href="https://www.tiktok.com/@nerth.studio?_r=1&_d=e4a27c4jjlg5c5&sec_uid=MS4wLjABAAAAdXwlrKEBbgz5IvCyQtHLFL0TyU5JEC2elnciv_N4My-GMIW6qJOObkfJpbHTHacJ&share_author_id=7223085511085458458&sharer_language=en&source=h5_t&u_code=dak532ij94m864&ug_btm=b6880,b5836&sec_user_id=MS4wLjABAAAA_cClL3-PkHQ76W4nidWkbGc__8USWs19n_ue7_IRNBwep2LzkAxnR5oNq6wE1oBa&utm_source=copy&social_share_type=5&utm_campaign=client_share&utm_medium=ios&tt_from=copy&user_id=6790887901447439361&enable_checksum=1&share_link_id=8AA3BC6B-4EBC-4FD4-8497-1F42FD99BA0A&share_app_id=1180"
                    target="_blank">
                    <img src="{{ asset('img/TIKTOK.PNG') }}" alt="">
                </a>
            </div>
        </div>
    </footer>

</body>

</html>
