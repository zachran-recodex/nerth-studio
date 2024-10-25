<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::user()->hasRole('admin') ? __('Customer Details') : __('My Orders') }}
            </h2>
            <a href="{{ route('orders.index') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Back to Orders
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">

                <div class="flex flex-row items-center gap-x-3 justify-between">
                    <div>
                        <p class="text-base text-slate-500">
                            Total Amount
                        </p>
                        <h3 class="text-xl font-bold text-indigo-950">
                            Rp{{ number_format($order->total_amount, 0, ',', '.') }}
                        </h3>
                    </div>
                    <div>
                        <p class="text-base text-slate-500">
                            Order Date
                        </p>
                        <h3 class="text-xl font-bold text-indigo-950">
                            {{ $order->created_at->format('d M Y') }}
                        </h3>
                    </div>
                    <div>
                        <p class="text-base text-center text-slate-500">
                            Status
                        </p>
                        @if ($order->status)
                            <h3 class="py-1 px-3 text-xl font-bold text-white bg-green-500 rounded-full">
                                DELIVERED
                            </h3>
                        @else
                            <h3 class="py-1 px-3 text-xl font-bold text-white bg-orange-500 rounded-full">
                                PENDING
                            </h3>
                        @endif
                    </div>
                </div>

                <hr class="my-3">

                <div>
                    <div class="pb-5">
                        <h3 class="text-xl font-bold text-indigo-950">
                            List of Items
                        </h3>
                    </div>

                    <div class="grid-cols-4 grid gap-x-24">
                        <div class="flex flex-col gap-y-5 col-span-2">
                            @forelse ($order->orderDetails as $detail)
                                <div class="item-card flex flex-row items-center">
                                    <div class="flex flex-row items-center gap-x-36 justify-between pb-5">
                                        <img src="{{ Storage::url($detail->product->image) }}"
                                            alt="{{ $detail->product->title }}" class="w-[50px] h-[50px]">
                                        <div>
                                            <h3 class="text-lg font-bold text-indigo-950">
                                                {{ $detail->product->title }}
                                            </h3>
                                            <p class="text-base text-slate-500">
                                                Rp{{ number_format($detail->product->price, 0, ',', '.') }}
                                            </p>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-indigo-950">
                                                Size
                                            </h3>
                                            <p class="text-base text-slate-500">
                                                XL
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">
                                    No Products
                                </p>
                            @endforelse

                            <div class="py-5">
                                <h3 class="text-xl font-bold text-indigo-950">
                                    Details of Delivery
                                </h3>
                            </div>

                            <div class="item-card flex flex-row justify-between items-center">
                                <p class="text-base text-slate-500">
                                    Address
                                </p>
                                <h3 class="text-lg font-bold text-indigo-950">
                                    {{ $order->address }}
                                </h3>
                            </div>
                            <div class="item-card flex flex-row justify-between items-center">
                                <p class="text-base text-slate-500">
                                    City
                                </p>
                                <h3 class="text-lg font-bold text-indigo-950">
                                    {{ $order->city }}
                                </h3>
                            </div>
                            <div class="item-card flex flex-row justify-between items-center">
                                <p class="text-base text-slate-500">
                                    Post Code
                                </p>
                                <h3 class="text-lg font-bold text-indigo-950">
                                    {{ $order->post_code }}
                                </h3>
                            </div>
                            <div class="item-card flex flex-row justify-between items-center">
                                <p class="text-base text-slate-500">
                                    Phone
                                </p>
                                <h3 class="text-lg font-bold text-indigo-950">
                                    {{ $order->phone }}
                                </h3>
                            </div>
                            <div class="item-card flex flex-col items-start">
                                <p class="text-base text-slate-500 pb-2">
                                    Note
                                </p>
                                <h3 class="text-lg font-bold text-indigo-950">
                                    {{ $order->note }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex flex-col col-span-2 items-center">
                            <h3 class="text-lg font-bold text-indigo-950 pb-5">
                                Proof of Payment
                            </h3>
                            <img src="{{ Storage::url($order->payment) }}" alt="" class="w-[300px] h-[400px]">

                            <hr class="my-5">

                            @role('admin')
                                @if ($order->status)
                                    <a href=""
                                        class="w-fit font-bold py-3 px-5 rounded-full text-white bg-slate-600 hover:bg-slate-900 ml-4">
                                        Contact Customer
                                    </a>
                                @else
                                    <form action="{{ route('orders.update', $order) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="w-fit font-bold py-3 px-5 rounded-full text-white bg-green-600 hover:bg-green-900 ml-4">Approve</button>
                                    </form>
                                @endif
                            @endrole
                        </div>
                    </div>

                    <hr class="my-5">

                    @role('customer')
                        <a href="" class="w-fit font-bold py-3 px-5 rounded-full text-white bg-slate-600">
                            Contact Admin
                        </a>
                    @endrole
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
