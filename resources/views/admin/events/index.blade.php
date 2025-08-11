{{-- resources/views/admin/events/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Kelola Events</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Simple Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
                    <p class="text-sm text-gray-600">Kelola Events BEM FEB UI</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-blue-600 hover:text-blue-800">← Kembali ke Website</a>
                    <span class="text-gray-500">|</span>
                    <span class="text-gray-600">Admin</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="app">
        <admin-events></admin-events>
    </div>
</body>
</html>