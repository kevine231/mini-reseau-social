<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer tous les utilisateurs
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('Aucun utilisateur trouvé. Création d\'un utilisateur de test...');
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
            $users = collect([$user]);
        }

        // Créer quelques posts de test
        $posts = [
            [
                'content' => 'Bienvenue sur notre réseau social ! 🎉',
                'image' => 'https://source.unsplash.com/random/800x600/?welcome'
            ],
            [
                'content' => 'Une belle journée ensoleillée ☀️',
                'image' => 'https://source.unsplash.com/random/800x600/?sunny'
            ],
            [
                'content' => 'Partagez vos moments avec vos amis ! 📸',
                'image' => 'https://source.unsplash.com/random/800x600/?friends'
            ],
            [
                'content' => 'N\'oubliez pas de rejoindre des groupes qui vous intéressent ! 👥',
                'image' => null
            ],
            [
                'content' => 'Que faites-vous aujourd\'hui ? 🤔',
                'image' => null
            ]
        ];

        foreach ($posts as $postData) {
            Post::create([
                'user_id' => $users->random()->id,
                'content' => $postData['content'],
                'image' => $postData['image'],
                'likes_count' => rand(0, 50),
                'comments_count' => rand(0, 20)
            ]);
        }

        $this->command->info('Posts de test créés avec succès !');
    }
} 