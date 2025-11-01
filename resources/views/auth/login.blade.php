@extends('layouts.auth')

@section('content')
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="space-y-6">
      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
        <input type="email" name="email" id="email" 
               class="w-full border border-mint-100 rounded-lg px-4 py-2.5 
                      focus:ring-2 focus:ring-mint-200 focus:border-mint-600 
                      transition-colors duration-200"
               required autofocus>
        @error('email')<span class="text-sm text-red-500 mt-1">{{ $message }}</span>@enderror
      </div>

      <div>
        <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
        <input type="password" name="password" id="password" 
               class="w-full border border-mint-100 rounded-lg px-4 py-2.5 
                      focus:ring-2 focus:ring-mint-200 focus:border-mint-600 
                      transition-colors duration-200"
               required>
        @error('password')<span class="text-sm text-red-500 mt-1">{{ $message }}</span>@enderror
      </div>

      <button type="submit" 
              class="w-full bg-mint-600 text-white rounded-lg py-3 font-medium
                     hover:bg-mint-700 transition-colors duration-200
                     focus:ring-2 focus:ring-offset-2 focus:ring-mint-600">
        Masuk
      </button>
    </div>
  </form>
@endsection
