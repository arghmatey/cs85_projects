@extends('layout')

@section('content')
<h1 class="mb-4">Add Contact</h1>

<form action="{{ route('contacts.store') }}" method="POST" class="card p-4">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name')}}" class="form-control">
        @error('name') <p>{{ $message }}</p>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email')}}" class="form-control">
        @error('email') <p>{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" value="{{ old('phone')}}" class="form-control">
        @error('phone') <p>{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection