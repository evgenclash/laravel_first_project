@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                <div class="text-white bg-red-500 rounded-lg flex justify-center mb-4 w-full border-2 p-4">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('status') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="idPerson" class="sr-only">Email</label>
                    <input type="text" name="idPerson" id="idPerson" placeholder="Your Id" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="statusPerson" class="sr-only">Password</label>
                    <input type="text" name="statusPerson" id="statusPerson" placeholder="New status" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full ">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
@endsection
