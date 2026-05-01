@extends('layouts.app')

@section('content')
    <div class="header">
        <h1>Contact details</h1>

        <a href="{{ route('contacts.index') }}">Back to contacts</a>
    </div>

    <div class="details">
        <div>
            <strong>ID:</strong>
            {{ $contact->id }}
        </div>

        <div>
            <strong>Name:</strong>
            {{ $contact->name }}
        </div>

        <div>
            <strong>Contact:</strong>
            {{ $contact->contact }}
        </div>

        <div>
            <strong>Email:</strong>
            {{ $contact->email }}
        </div>
    </div>

    <div class="actions" style="margin-top: 16px;">
        <a href="{{ route('contacts.edit', $contact->id) }}" class="button">
            Edit contact
        </a>

        <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="button button-danger">
                Delete contact
            </button>
        </form>
    </div>
@endsection