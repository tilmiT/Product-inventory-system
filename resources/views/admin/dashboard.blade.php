@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Total Users Card -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg rounded-lg p-6 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold">Total Users</h2>
                    <p class="text-4xl font-bold mt-2">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="text-5xl">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <!-- Total Products Card -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg rounded-lg p-6 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold">Total Products</h2>
                    <p class="text-4xl font-bold mt-2">{{ \App\Models\Product::count() }}</p>
                </div>
                <div class="text-5xl">
                    <i class="fas fa-boxes"></i>
                </div>
            </div>
        </div>
    </div>
@endsection