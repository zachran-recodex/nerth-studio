<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::user()->hasRole('admin') ? __('Customer Orders') : __('My Orders') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">

                @forelse ($orders as $order)
                    <div class="flex flex-row items-center gap-x-3 justify-between py-5">
                        <div>
                            <p class="text-base text-slate-500">
                                Total Amount
                            </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                Idr. {{ number_format($order->total_amount, 0, ',', '.') }}
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
                            @if ($order->status)
                                <p class="py-1 px-3 text-sm text-white bg-green-500 rounded-full">
                                    DELIVERED
                                </p>
                            @else
                                <p class="py-1 px-3 text-sm text-white bg-orange-500 rounded-full">
                                    PENDING
                                </p>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('orders.show', $order->id) }}"
                                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No Orders</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
