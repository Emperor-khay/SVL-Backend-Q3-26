@extends('layout.app')


@section('title')
    Add Product
@endsection

@section('content')
    <section class="bg-slate-100 min-h-screen py-10">
        @if($errors)
            <div class="bg-red-500 text-white p-3">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-green-600 px-8 py-6">
                    <h1 class="text-3xl font-bold text-white">Add New Product</h1>
                    <p class="text-green-100 mt-1">
                        Fill in the details below to register a new product.
                    </p>
                </div>

                <!-- Form -->
                <form action="/product/add" enctype="multipart/form-data" method="POST" class="p-8 space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Product Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Product Name
                            </label>
                            
                            <input type="text" name="productname"  value="{{ old('productname') }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition">
                            @error('productname')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Quantity
                            </label>
                            <input type="text" name="qty"  value="{{ old('qty') }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition">
                            @error('qty')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div>

                        <!-- price -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Price
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-3 text-gray-500">$</span>

                                <input type="number" name="price" step="0.01" placeholder="25000.00"  value="{{ old('price') }}"
                                    class="w-full pl-8 rounded-lg border border-gray-300 px-4 py-3 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition">
                            </div>
                            @error('price')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div>


                        <!-- Discount -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Discount Price
                            </label>

                            <div class="relative">
                                <span class="absolute left-4 top-3 text-gray-500">$</span>

                                <input type="number" name="discount" step="0.01" placeholder="25000.00"  value="{{ old('discount') }}"
                                    class="w-full pl-8 rounded-lg border border-gray-300 px-4 py-3 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition">
                            </div>
                            @error('discount')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div>

                        {{-- FIle Upload --}}
                        {{-- <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                File
                            </label>

                            <input type="file" name="carImage" id="">
                            @error('carImage')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div> --}}

                    </div>

                    <!-- Buttons -->
                    <div class="border-t pt-6 flex flex-col sm:flex-row justify-end gap-3">

                        <button type="reset"
                            class="px-6 py-3 rounded-lg border border-gray-300 hover:bg-gray-100 transition font-medium">
                            Reset
                        </button>

                        <button type="submit"
                            class="px-6 py-3 rounded-lg bg-green-600 hover:bg-green-700 text-white font-semibold shadow-md transition">
                            Save Car
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
@endsection
