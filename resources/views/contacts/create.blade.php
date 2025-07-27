@extends('layout')

@section('content')
<h1>Add Contact</h1>

<form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name')}}">
    @error('name') <p>{{ $message }}</p>@enderror

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email')}}">
    @error('email') <p>{{ $message }}</p> @enderror

    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone')}}">
    @error('phone') <p>{{ $message }}</p> @enderror

    <button type="submit">Save</button>
</form>
@endsection