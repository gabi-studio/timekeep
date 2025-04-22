@extends('layout')

@section('content')
<h1>Create Timekeeper</h1>


@if ($errors->any())
    <!-- Display validation errors if any -->
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('timekeepers.store') }}" method="POST">
    {{ csrf_field() }}

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Password" required>

    <label for="role">Role:</label>
    <select id="role" name="role" required>
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
    </select>

    <button type="submit">Create Timekeeper</button>
</form>
@endsection
