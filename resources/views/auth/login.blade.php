@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">Login</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="text-sm">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-1">Password</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-black text-white px-4 py-2 rounded">Login</button>
            </div>
        </form>
    </div>
@endsection
