@extends('layout')  <!-- Hérite du layout principal -->

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Bienvenue sur mon Mini Réseau Social</h1>
        <p class="text-center">Connectez-vous et discutez avec vos amis.</p>
        <div class="text-center">
            <a href="{{ url('/register') }}" class="btn btn-primary">Inscription</a>
        </div>
    </div>
@endsection
