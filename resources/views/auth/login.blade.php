@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
<form method="POST" action="/login" class="max-w-sm mx-auto mt-10 space-y-4 p-6 bg-white rounded-lg shadow border border-slate-200">
    @csrf
    <h2 class="text-xl font-bold text-slate-800 text-center mb-4">Health Worker Login</h2>

    <div>
        <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full border rounded p-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
        @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Password</label>
        <input type="password" name="password" placeholder="Password" class="w-full border rounded p-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
        @error('password') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold rounded p-2 text-sm transition">Sign in</button>
</form>
@endsection