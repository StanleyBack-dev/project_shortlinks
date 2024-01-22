<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!-- Custom Forms plugin (optional) -->
    <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        html {
            font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial,
                "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
</head>
<body class="leading-normal tracking-normal text-indigo-400 m-6 bg-blue-900 min-h-screen flex items-center justify-center">
    <div class="container mx-auto my-8 p-8 bg-white shadow-md rounded-md">
        <h1 class="text-4xl font-bold mb-4 text-blue-500 text-center">Faça seu Login</h1>
        <form method="POST" action="{{ route('login') }}" class="bg-transparent">
            @csrf
            <div class="flex flex-col items-center">
                <label for="email" class="font-bold block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                <label for="password" class="font-bold block text-sm font-medium text-gray-700 mt-4">Senha:</label>
                <input type="password" id="password" name="password" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Login</button>
            </div><br>
        </form>
        @if ($errors->any())
    <div class="text-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">Algo deu errado.</span>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
</body>
</html>