@extends('layout.app')

@section('title')
    Laravel Demo
@endsection


@section('head')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
@endsection


@section('content')

    <h1>Welcome {{ $name }}</h1>
    {{-- @switch($role)
        @case('admin')
            <h1>Welcome Admin</h1>
            @break

        @default
            <h1>Welcome User</h1>
    @endswitch --}}

        <h1>This is the home page</h1>
    {{-- @if($role == 'admin')
        <h1>Welcome Admin</h1>
    @else
        <h1>Welcome User</h1>
    @endif --}}



    {{-- <x-example-component>
        <p>
            Inserted Slot
        </p> --}}
    <x-example-component/>


    @include('partials.footer', ['name' => "Schoolville"] )
    @include('partials.footer', ['name' => "Cowrywise"] )
    @include('partials.footer', ['name' => "W3Schools"] )

   {{-- <x-test-component/> --}}

    <a href="{{ route('login') }}">Go to login page</a>
    <a href="{{ route('register') }}">Go to register page</a>
@endsection
