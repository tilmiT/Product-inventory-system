@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-medium text-gray-700">Total Users</h2>
                <p class="text-3xl font-bold text-blue-600">{{ \App\Models\User::count() }}</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-medium text-gray-700">Total Products</h2>
                <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Product::count() }}</p>
            </div>
        </div>
        <!-- Users Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <h2 class="text-xl font-semibold text-gray-800 p-4">Registered Users</h2>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-left text-sm font-medium text-gray-700">Name</th>
                        <th class="p-4 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="p-4 text-left text-sm font-medium text-gray-700">Role</th>
                        <th class="p-4 text-left text-sm font-medium text-gray-700">Products</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-t border-gray-200 hover:bg-gray-50 transition duration-150">
                            <td class="p-4">{{ $user->name }}</td>
                            <td class="p-4">{{ $user->email }}</td>
                            <td class="p-4">{{ $user->role }}</td>
                            <td class="p-4">{{ $user->products()->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection