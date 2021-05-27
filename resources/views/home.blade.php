<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>AST Explorer</title>
</head>
<body class="flex flex-col min-h-screen antialiased bg-white font-sans text-black">
    <header class="w-full bg-gray-100 py-4 px-16 border-b border-gray-300 shadow-sm">
        <h1 class="font-medium">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">AST Explorer</a>
        </h1>
    </header>

    <main class="flex-1"></main>

    <footer class="bg-gray-100 py-4 px-16 text-sm text-gray-600 border-t border-gray-300">
        <div class="flex items-center justify-between">
            <span>
                Built by <a href="https://twitter.com/ryangjchandler" target="_blank" rel="noopener noreferrer" class="text-gray-700 underline hover:text-gray-900">Ryan Chandler</a>.
            </span>

            <span>
                <a href="https://github.com/ryangjchandler/ast-explorer" target="_blank" rel="noopener noreferrer" class="text-gray-700 hover:text-gray-900">
                    <svg role="img" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><title>GitHub icon</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                </a>
            </span>
        </div>
    </footer>
</body>
</html>
