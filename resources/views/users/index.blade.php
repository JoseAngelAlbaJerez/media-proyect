<!-- users/index.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <h2>List of Users</h2>

    @foreach ($users as $user)
        <div>
            <p>{{ $user->name }}</p>
            <!-- Add other user information as needed -->
        </div>
    @endforeach

    {{ $users->links() }} <!-- Display pagination links -->
@endsection
