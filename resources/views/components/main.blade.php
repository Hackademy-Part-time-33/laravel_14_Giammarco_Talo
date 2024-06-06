<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Il Blog</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        
        
        <nav class="bg-white shadow">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <a class="text-lg font-semibold" href="{{ url('/') }}">
                        IL BLOG
                    </a>
                    <div>
                        <ul class="flex space-x-4">
                            <li><a class="hover:text-gray-700" href="{{ route('posts.index') }}">Tutti i Post</a></li>
                            <li><a class="hover:text-gray-700 mr-5" href="{{ route('posts.create') }}">Crea un Post</a></li>
                            @guest
                            <a class="btn btn-sm btn-outline-secondary mx-2" href="{{ route('register') }}">Registrati</a>
                            <a class="btn btn-sm btn-outline-secondary mx-2" href="{{ route('login') }}">Entra</a>
                            @else
                            <span>Benvenuto, {{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary mx-2" type="submit">Logout</button>
                            </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main class="container mx-auto mt-4 mx-5">
            
            {{ $slot }}
            
        </main>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </body>
    </html>
    
</div>
