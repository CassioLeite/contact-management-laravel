<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Contact Management') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #222;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .button {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #2563eb;
            border-radius: 4px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .button:hover {
            text-decoration: none;
            background: #1d4ed8;
        }

        .button-danger {
            border-color: #dc2626;
            background: #dc2626;
        }

        .button-danger:hover {
            background: #b91c1c;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .alert-success {
            padding: 12px;
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            margin-bottom: 16px;
            border-radius: 4px;
        }

        .alert-error {
            padding: 12px;
            background: #fee2e2;
            border: 1px solid #fca5a5;
            color: #991b1b;
            margin-bottom: 16px;
            border-radius: 4px;
        }

        .details {
            margin-top: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .details div {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .details div:last-child {
            border-bottom: none;
        }

        form {
            margin: 0;
        }

                .form-group {
            margin-bottom: 16px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            max-width: 420px;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .field-error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <main class="container">
        <div class="actions" style="justify-content: flex-end; margin-bottom: 16px;">
            @auth
                <span>{{ auth()->user()->email }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="button">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="button">Login</a>
            @endauth
        </div>
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>