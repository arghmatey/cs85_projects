@extends ('layout')

@section('content')
<h1 class="mb-4">Contact List</h1>

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<table class="table table-bordered table-hover">
    <thead class="table-dark">
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
                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{route('contacts.destroy', $contact)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this contact?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4" class="text-center">No contacts</td></tr>
    @endforelse
    </tbody>
</table>
@endsection