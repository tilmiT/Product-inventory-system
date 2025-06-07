<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="antialiased bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">Inventory</h1>
            </div>
            <nav class="mt-4">
                <ul>
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <li class="px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }} hover:bg-blue-50 hover:text-blue-600 transition duration-200">
                            <a href="{{ route('admin.dashboard') }}" class="block">Admin Dashboard</a>
                        </li>
                    @else
                        <li class="px-4 py-3 {{ request()->routeIs('admin.login.form') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }} hover:bg-blue-50 hover:text-blue-600 transition duration-200">
                            <a href="{{ route('admin.login.form') }}" class="block">Admin Login</a>
                        </li>
                    @endif
                    <li class="px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }} hover:bg-blue-50 hover:text-blue-600 transition duration-200">
                        <a href="{{ route('dashboard') }}" class="block">Dashboard</a>
                    </li>
                    <li class="px-4 py-3 {{ request()->is('products*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }} hover:bg-blue-50 hover:text-blue-600 transition duration-200">
                        <a href="{{ route('products.index') }}" class="block">Products</a>
                    </li>
                    <li class="px-4 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition duration-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-left w-full">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-8 overflow-auto">
            @yield('content')
        </div>
    </div>
</body>
</html>