<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Product') }}
            </h2>
            <a href="{{ route('admin.products.index') }}"
                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.products.update', $product->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title', $product->title)" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="slug" :value="__('Slug')" />
                        <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                            :value="old('slug', $product->slug)" required readonly />
                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="image" :value="__('Image')" />
                        <div class="mb-2">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->title }}"
                                class="rounded-2xl object-cover w-[90px] h-[90px]">
                        </div>
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                            :value="old('price', $product->price)" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block mt-1 w-full" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="background" :value="__('Background')" />
                        <div class="mb-2">
                            <img src="{{ Storage::url($product->background) }}" alt="{{ $product->title }}"
                                class="rounded-2xl object-cover w-[90px] h-[90px]">
                        </div>
                        <x-text-input id="background" class="block mt-1 w-full" type="file" name="background" />
                        <x-input-error :messages="$errors->get('background')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Product
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('title').addEventListener('input', function() {
            let title = this.value;
            let slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
</x-app-layout>
