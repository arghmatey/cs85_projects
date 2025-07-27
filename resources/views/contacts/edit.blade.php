@extends('layout')

@section('content')
<h1>Edit Contact</h1>

<form action="{{ route('contacts.update', $contact) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $contact->name) }}">
    @error('name') <p>{{ $message }}</p>@enderror

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $contact->email) }}">
    @error('email') <p>{{ $message }}</p> @enderror

    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}">
    @error('phone') <p>{{ $message }}</p> @enderror

    <button type="submit">Update</button>
</form>
@endsection