@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Bienvenue sur Mon Réseau !</h5>
            {{-- Exemple de post --}}
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="avatar">
                    <div>
                        <strong>Jean Dupont</strong><br>
                        <small class="text-muted">il y a 30 heures</small>
                    </div>
                </div>
                <div class="card-body">
                    <p>Voici un post de test avec un peu de contenu. 🎉</p>
                    <img src="https://via.placeholder.com/600x300" class="img-fluid rounded" alt="post image">

                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-outline-primary btn-sm">👍 J'aime</button>
                    <button class="btn btn-outline-secondary btn-sm">💬 Commenter</button>
                    <button class="btn btn-outline-success btn-sm">↪️ Partager</button>
                </div>
            </div>

            <p class="card-text">Ceci est votre fil d'actualité.</p>
        </div>
    </div>
      @endsection
