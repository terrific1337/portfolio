@php $pageTitle = 'Dashboard'; @endphp

@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-4">Welcome to your Dashboard</h1>

        <p>Hello, {{ Auth::user()->name }}!</p>

        <p class="mt-4 text-gray-600">This is your personal dashboard area. You’re logged in and ready to go.</p>
    </div>
@endsection
