@extends('layout')  <!-- Utilisation de ton layout principal -->

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Liste des utilisateurs</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->active == 1 ? 'Actif' : 'Inactif' }}</td>
                        <td>
                            @if ($user->active == 0)
                                <!-- Lien pour activer l'utilisateur -->
                                <a href="{{ url('/user/' . $user->id . '/activate') }}" class="btn btn-success btn-sm">Activer</a>
                            @else
                                <!-- Lien pour désactiver l'utilisateur -->
                                <a href="{{ url('/user/' . $user->id . '/deactivate') }}" class="btn btn-danger btn-sm">Désactiver</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
