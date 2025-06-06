@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $product->name }}</h1>
        <div class="bg-white p-6 rounded-xl shadow-lg space-y-4">
            <p><strong class="text-gray-700">Description:</strong> {{ $product->description ?? 'N/A' }}</p>
            <p><strong class="text-gray-700">Quantity:</strong> {{ $product->quantity }}</p>
            <p><strong class="text-gray-700">Price:</strong> ${{ number_format($product->price, 2) }}</p>
            @if (auth()->user()->role === 'admin' || $product->user_id === auth()->id())
                <div class="flex space-x-4">
                    <a href="{{ route('products.edit', $product) }}" class="px-4 py-2 text-white bg-yellow-600 rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition duration-200">Edit</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-200" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection