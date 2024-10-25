<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart | Nerth Studio</title>
    <link rel="shortcut icon" href="favicon.ico" type="img/logo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 h-screen">

    <div class="container mx-auto mt-10">

        <header>
            <!-- Navigation -->
            <nav class="flex justify-between my-8">
                <div class="back">
                    <a class="font-medium text-xl px-5 py-2.5 text-outline" href="{{ route('home') }}">
                        BACK
                    </a>
                </div>
                <div class="login">
                    @auth
                        <button class="font-medium text-xl px-5 py-2.5" type="button" data-modal-target="logout-modal"
                            data-modal-toggle="logout-modal">
                            <p class="text-outline">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
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

        <section class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Your Cart</h2>
            @if (session('cart'))
                <div class="mb-6">
                    @foreach (session('cart') as $id => $details)
                        <div class="flex items-center justify-between mb-4 p-4 bg-gray-50 rounded-lg">
                            <img src="{{ Storage::url($details['image']) }}" alt="{{ $details['name'] }}"
                                class="w-16 h-16 rounded-lg">
                            <div class="flex-1 ml-4">
                                <h3 class="text-lg font-semibold">{{ $details['name'] }}</h3>
                                <p class="text-gray-600">Size: {{ $details['size'] }}</p>
                                <div class="flex items-center mt-2">
                                    <button class="px-2 py-1 bg-gray-300 text-gray-600 rounded"
                                        onclick="decreaseQuantity('{{ $id }}')">-</button>
                                    <span class="mx-2 quantity"
                                        data-id="{{ $id }}">{{ $details['quantity'] }}</span>
                                    <button class="px-2 py-1 bg-gray-300 text-gray-600 rounded"
                                        onclick="increaseQuantity('{{ $id }}')">+</button>
                                </div>
                            </div>
                            <div class="text-lg font-semibold">Idr.
                                {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</div>
                            <button class="ml-4 text-red-600" onclick="removeFromCart('{{ $id }}')">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-xl font-semibold">
                        Total: Idr.
                        {{ number_format(
                            array_sum(
                                array_map(function ($details) {
                                    return $details['price'] * $details['quantity'];
                                }, session('cart')),
                            ),
                            0,
                            ',',
                            '.',
                        ) }}
                    </div>
                    <a href="{{ route('checkout') }}" class="px-6 py-2 bg-black text-white rounded-lg">Proceed to
                        Checkout</a>
                </div>
            @else
                <p class="text-gray-600">Your cart is empty.</p>
            @endif
        </section>

    </div>


    <script>
        function increaseQuantity(id) {
            let quantityElement = document.querySelector(`.quantity[data-id="${id}"]`);
            let currentQuantity = parseInt(quantityElement.textContent, 10);
            updateCart(id, currentQuantity + 1);
        }

        function decreaseQuantity(id) {
            let quantityElement = document.querySelector(`.quantity[data-id="${id}"]`);
            let currentQuantity = parseInt(quantityElement.textContent, 10);
            if (currentQuantity > 1) {
                updateCart(id, currentQuantity - 1);
            }
        }

        function updateCart(id, quantity) {
            fetch('{{ route('update.cart') }}', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: id,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    location.reload();
                });
        }

        function removeFromCart(id) {
            fetch('{{ route('remove.from.cart') }}', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    location.reload();
                });
        }
    </script>

</body>

</html>
