@extends('layout')

@section('content')
<h1>Edit Timekeeper</h1>

<!-- Do not hard code the URL for action as "/timekeepers", use route for flexibility -->
<!-- The CSRF token is a security feature to prevent cross-site request forgery -->
@if ($errors->any())
    <!-- Display validation errors if any -->
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('timekeepers.update', $timekeeper->id) }}" method="POST">
    {{ csrf_field() }}
    <!-- CSRF token for security -->

    <!-- Specify the HTTP method as PUT for updating data -->
    @method('PUT')

    <!-- Form fields for editing Timekeeper details -->

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') ?? $timekeeper->name }}" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') ?? $timekeeper->email }}" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Leave blank to keep current password">

    <label for="role">Role:</label>
    <select id="role" name="role" required>
        <option value="admin" {{ (old('role') ?? $timekeeper->role) == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ (old('role') ?? $timekeeper->role) == 'user' ? 'selected' : '' }}>User</option>
    </select>

    <button type="submit">Edit Timekeeper</button>
</form>
@endsection
