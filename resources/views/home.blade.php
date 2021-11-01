<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-seo::meta />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="flex flex-col min-h-screen font-sans antialiased text-black bg-white">
    <header class="w-full px-8 py-3 bg-gray-100 border-b border-gray-300 shadow-sm">
        <div class="flex items-center justify-between w-full pr-8">
            <h1 class="font-medium">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">AST Explorer</a>
            </h1>

            <div class="space-x-2 text-sm">
                <button title="Ctrl/Cmd + S" type="button" x-data x-on:click="$dispatch('save')" class="px-4 py-2 text-sm font-bold text-white bg-green-500 rounded hover:bg-blue-700">
                    Save
                </button>

                <button title="Ctrl/Cmd + Enter" type="button" x-data x-on:click="$dispatch('generate')" class="px-4 py-2 text-sm font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                    Generate
                </button>
            </div>
        </div>
    </header>

    <main class="flex flex-1">
        <div
            x-data="{ ...@radio('App\\Http\\Components\\AST'), ...window.ASTExplorer() }"
            x-init="init"
            x-on:generate.window="await generate(); format()"
            class="flex flex-1 divide-x-2 divide-gray-300"
        >
            <div class="w-1/2 h-full" x-ref="editor" placeholder="Type your code here..."></div>
            <div x-ref="json" class="w-1/2 h-full p-4"></div>
        </div>
    </main>

    <footer class="px-8 py-4 text-sm text-gray-600 bg-gray-100 border-t border-gray-300">
        <div class="flex items-center justify-between">
            <div>
                Built by <a href="https://twitter.com/ryangjchandler" target="_blank" rel="noopener noreferrer" class="text-gray-700 underline hover:text-gray-900">Ryan Chandler</a>.
                Powered by <a href="https://github.com/radio-js/radio" target="_blank" rel="noopener noreferrer" class="text-gray-700 underline hover:text-gray-900">Radio.js</a> and <a href="https://github.com/nikic/PHP-Parser" target="_blank" rel="noopener noreferrer" class="text-gray-700 underline hover:text-gray-900">PHP-Parser</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="https://github.com/ryangjchandler/ast-explorer" target="_blank" rel="noopener noreferrer" class="text-gray-700 hover:text-gray-900">
                    <svg role="img" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><title>GitHub icon</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                </a>
                <a href="https://twitter.com/ryangjchandler" target="_blank" rel="noopener noreferrer" class="text-gray-700 hover:text-gray-900">
                    <svg role="img" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><title>Twitter icon</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </a>
            </div>
        </div>
    </footer>

    @radioScripts
    @stack('scripts')
</body>
</html>
