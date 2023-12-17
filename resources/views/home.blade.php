<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV's List</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">CV's</h1>
    </div>
    <div class="flex justify-end px-4 sm:px-6 lg:px-8">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add CV
        </button>
    </div>
</header>

<main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Replace with your content -->
    <div class="px-4 py-6 sm:px-0">
        <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">
            @for ($i = 0; $i < 5; $i++)
                <div class="flex items-center justify-between p-3 border-b border-gray-300">
                    <span class="text-lg font-medium text-gray-700">Random Name {{$i + 1}}</span>
                    <div>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Open</button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Edit</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <!-- /End replace -->
</main>
</body>
</html>
