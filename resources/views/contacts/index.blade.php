@extends('layouts.app')

@section('content')
    <div class="header">
        <h1>Contacts</h1>

        @auth
            <a href="{{ route('contacts.create') }}" class="button">Add contact</a>
        @endauth
    </div>

    @if ($contacts->isEmpty())
        <p>No contacts found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>
                            @auth
                                <a href="{{ route('contacts.show', $contact->id) }}">
                                    {{ $contact->name }}
                                </a>
                            @else
                                {{ $contact->name }}
                            @endauth
                        </td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            @auth
                                <div class="actions">
                                    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>

                                    <form
                                        method="POST"
                                        action="{{ route('contacts.destroy', $contact->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this contact?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="button button-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @else
                                -
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection