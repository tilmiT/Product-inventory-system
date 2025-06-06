@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">User Dashboard</h1>
        <!-- Product Count Card -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white shadow-lg rounded-xl p-6 flex items-center justify-between mb-8">
            <div>
                <h2 class="text-xl font-semibold">Your Products</h2>
                <p class="text-4xl font-bold mt-2">{{ auth()->user()->products()->count() }}</p>
            </div>
            <div class="text-5xl">
                <i class="fas fa-box"></i>
            </div>
        </div>
        <!-- Products Table -->
        @if (auth()->user()->products()->count() > 0)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4 text-left text-sm font-medium text-gray-700">Name</th>
                            <th class="p-4 text-left text-sm font-medium text-gray-700">Description</th>
                            <th class="p-4 text-left text-sm font-medium text-gray-700">Price</th>
                            <th class="p-4 text-left text-sm font-medium text-gray-700">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->products as $product)
                            <tr class="border-t border-gray-200 hover:bg-gray-50 transition duration-150">
                                <td class="p-4">{{ $product->name }}</td>
                                <td class="p-4">{{ $product->description ?? 'N/A' }}</td>
                                <td class="p-4">${{ number_format($product->price, 2) }}</td>
                                <td class="p-4">{{ $product->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white p-6 rounded-xl shadow-lg text-center text-gray-600">
                <p>No products found. <a href="{{ route('products.create') }}" class="text-blue-600 hover:text-blue-800">Add a product</a> to get started.</p>
            </div>
        @endif
    </div>
@endsection