<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Encurtador de Links</title>

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

<body class="leading-normal tracking-normal text-indigo-400 m-6 min-h-screen flex items-center justify-center">
    <!-- Botão de Logout no canto superior direito -->
    <div class="absolute top-0 right-0 m-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-red-300">
                Sair
            </button>
        </form>
    </div>

    <div class="container mx-auto my-8 p-8">

        <h1 class="text-4xl font-bold mb-4 text-blue-500 text-center">Encurtador de Links</h1>

        <!-- Formulário para encurtar URLs -->
        <form action="{{ route('shortlinks.store') }}" method="post" class="mb-8 bg-transparent">
            @csrf
            <div class="flex flex-col items-center">
                <label for="url_original" class="font-bold block text-sm font-medium text-gray-700">Link Original:</label>
                <input type="text" name="url_original" id="url_original" class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300" required>
                @error('url_original')
                <p class="text-red-500 text-sm mt-1">A URL deve ser válida.</p>
                @enderror

                <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Encurtar
                    Link</button>
            </div>
        </form>

        <!-- Lista de Shortlinks -->
        <h2 class="text-black font-bold mb-4 text-center">Links Criados</h2>
        <div class="bg-gray-200 p-4 rounded-md">
            @forelse ($shortlinks as $shortlink)
            <div class="mb-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-center md:text-left max-w-xs md:max-w-full">
                        <strong class="text-black">Link Original:</strong>
                        <span class="break-all">{{ $shortlink->url_original }}</span>
                    </div>
                    <div class="flex flex-col items-center max-w-xs md:max-w-full">
                        <strong class="text-black">Link Curto:</strong>
                        <a href="{{ route('shortlinks.redirect', $shortlink->id) }}" class="break-all text-blue-500 hover:text-blue-700">{{ $shortlink->url_modifify }}</a>
                        <span class="font-bold text-sm text-black">Cliques: {{ $shortlink->click_count }}</span>
                    </div>
                </div>
                @if (!$loop->last)
                <hr class="my-4 border-black"> <!-- Linha de separação -->
                @endif
            </div>
            @empty
            <p class="text-center">Nenhum shortlink criado ainda.</p>
            @endforelse
        </div>
</body>

</html>