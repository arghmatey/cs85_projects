@extends ('layout')

@section('content')
<h1>Contact List</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
    @forelse($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->phone}}</td>
            <td>
                <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
                <form action="{{route('contacts.destroy', $contact)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this contact?')">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">No contacts</td></tr>
    @endforelse
    </tbody>
</table>
@endsection