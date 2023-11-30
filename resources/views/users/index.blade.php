<!-- users/index.blade.php -->

@extends('layouts.app', ['activePage' => 'show', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

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
