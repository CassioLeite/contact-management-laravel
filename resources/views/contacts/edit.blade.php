@extends('layouts.app')

@section('content')
    <div class="header">
        <h1>Edit contact</h1>

        <a href="{{ route('contacts.show', $contact->id) }}">Back to details</a>
    </div>

    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
        @csrf
        @method('PUT')

        @include('contacts._form', ['contact' => $contact])

        <button type="submit" class="button">
            Update contact
        </button>
    </form>
@endsection