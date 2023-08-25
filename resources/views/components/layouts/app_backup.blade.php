<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Memo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    Simple Memo
                </div>
                <div class="header-right">
                    @auth
                        <span>{{ Auth::user()->name }}</span>
                        <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    @else
                        <a href="{{ route('auth.login') }}">ログイン</a>
                        <a href="{{ route('auth.register') }}">登録</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="container mt-4">
        {{ $slot }}
    </main>

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
