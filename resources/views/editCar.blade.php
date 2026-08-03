@extends('layout.app')


@section('title')
    Cars Page
@endsection

@section('content')
    <section class="bg-slate-100 min-h-screen py-10">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                    

                <!-- Header -->
                <div class="bg-indigo-600 px-8 py-6">
                    <h1 class="text-3xl font-bold text-white">Edit Car</h1>
                  
                </div>

                <!-- Form -->
                <form action="/car/{{ $car->id }}/update" enctype="multipart/form-data" method="POST" class="p-8 space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Car Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Car Name
                            </label>
                            <input type="text" name="name" placeholder="Toyota"  value="{{ $car->name }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                            @error('name')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror
                        </div>

                        <!-- Model -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Model
                            </label>
                            <input type="text" name="model" placeholder="Camry"  value="{{ $car->model }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                            @error('model')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div>

                        <!-- Year -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Year
                            </label>
                            <input type="number" name="year" min="1900" max="2100" placeholder="2025"  value="{{$car->year }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                            @error('year')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div>

                        <!-- Colour -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Colour
                            </label>
                            <input type="text" name="colour" placeholder="Black"  value="{{ $car->colour }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                            @error('colour')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Price
                            </label>

                            <div class="relative">
                                <span class="absolute left-4 top-3 text-gray-500">$</span>

                                <input type="number" name="price" step="0.01" placeholder="25000.00"  value="{{ $car->price }}"
                                    class="w-full pl-8 rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                            </div>
                            @error('price')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Status
                            </label>

                            <select name="status" 
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                                <option value="">Select Status</option>
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                                <option value="in_purchase">In Purchase</option>
                            </select>
                            @error('status')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror

                        </div>

                        <!-- File Upload -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Status
                            </label>

                           <input type="file" name="carImage" id="">
                            @error('carImage')
                                <span class="text-red-500">
                                    {{ $message }}*
                                </span>
                            @enderror
                            
                            @if($car->image)
                                {{-- <h1>Car has image</h1> --}}
                                <div>
                                    <img src="{{ asset('storage/'.$car->image) }}" alt="">
                                </div>
                            @endif

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="border-t pt-6 flex flex-col sm:flex-row justify-end gap-3">

                        <a href="/cars"
                            class="px-6 py-3 rounded-lg border border-gray-300 hover:bg-gray-100 transition font-medium">
                            Back
                        </a>

                        <button type="submit"
                            class="px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow-md transition">
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
