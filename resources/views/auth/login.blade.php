@extends('layouts.app')

@section('content')
    <div class="header">
        <h1>Login</h1>

        <a href="{{ route('contacts.index') }}">Back to contacts</a>
    </div>

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
            >

            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label><br>
            <input
                type="password"
                id="password"
                name="password"
                required
            >

            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="button">
            Login
        </button>
    </form>
@endsection