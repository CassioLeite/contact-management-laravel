@extends('layouts.app')

@section('content')
    <div class="header">
        <h1>Add contact</h1>

        <a href="{{ route('contacts.index') }}">Back to contacts</a>
    </div>

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf

        @include('contacts._form')

        <button type="submit" class="button">
            Save contact
        </button>
    </form>
@endsection