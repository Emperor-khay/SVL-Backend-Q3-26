@extends('layout.app')

@section('title')
    View Cars
@endsection

@section('hero')
<!-- Navbar -->
<nav class="bg-white shadow-md">
    <div class=" mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            <div class="text-2xl font-bold text-blue-600">
                AutoMarket
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Cars</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
            </div>

            <button class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-gray-700"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

        </div>
    </div>
</nav>
    
@endsection

@section('content')    

    <!-- Main Content -->
    <div class=" p-6">

        <div>
            <a href="/cars/add" class="rounded-md bg-blue-700 text-white p-3 my-3 flex justify-self-end">Add New Car</a>
        </div>
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden grid grid-cols-3 gap-[30px]">

            @forelse ($cars as $car)
                <div class="grid md:grid-cols-1">

                    <!-- Image -->
                    <div class="bg-gray-200 flex items-center justify-center h-80 md:h-full">

                        <img
                        @if ($car->image)                            
                            src="{{ asset('storage/'.$car->image) }}"
                        @else
                            src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=900&q=80"
                        @endif
                            alt="Car"
                            class="w-full h-full object-cover">

                    </div>

                    <!-- Details -->
                    <div class="p-8">

                         @php
                            switch ($car->status) {
                                case 'in_purchase':
                                    $text = "In Purchase";
                                    $colour = 'orange';
                                    $canPurchase = true;
                                    break;
                                case 'sold':
                                    $text = "Sold";
                                    $colour = 'blue';
                                    $canPurchase = false;
                                    break;
                                case 'available':
                                    $text = "Available";
                                    $colour = 'green';
                                    $canPurchase = true;
                                    break;
                                
                            }
                        @endphp
                        <span class="inline-block px-4 py-1 rounded-full bg-[@php echo $colour @endphp] text-white text-sm font-semibold mb-4">
                          @php
                              echo $text
                          @endphp
                        </span>

                        <h1 class="text-4xl font-bold text-gray-800">
                            {{ $car->name }}
                        </h1>

                        <p class="text-gray-500 mt-2">
                            Premium Sports Car
                        </p>

                        <div class="mt-8 space-y-5">

                            <div class="flex justify-between border-b pb-3">
                                <span class="font-semibold text-gray-600">Brand</span>
                                <span>{{ $car->name }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-3">
                                <span class="font-semibold text-gray-600">Model</span>
                                <span>{{ $car->model }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-3">
                                <span class="font-semibold text-gray-600">Year</span>
                                <span>{{ $car->year }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-3">
                                <span class="font-semibold text-gray-600">Colour</span>
                                <span>{{ $car->colour }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-gray-600 text-lg">
                                    Price
                                </span>

                                <span class="text-3xl font-bold text-green-600">
                                   {{$car->price}}
                                </span>
                            </div>

                        </div>

                        <div class="mt-10 flex flex-col sm:flex-row gap-4">

                            <a href="/car/{{ $car->id }}"  class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-semibold transition">
                                Edit
                            </a>


                            <form action="/car/{{ $car->id }}/delete" method="POST">
                                @csrf
                                <input type="submit" value="Delete"  class="border border-red-600 text-red-600 hover:bg-red-600 hover:text-white py-3 px-6 rounded-lg font-semibold transition">
                            </form>

                        </div>

                    </div>

                </div>
            @empty
                
            @endforelse

        </div>

    </div>
@endsection
