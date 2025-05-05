<template>
    <div class="min-h-screen bg-gradient-to-br from-blue-900 to-purple-900 text-white">
        <!-- Navigation -->
        <nav class="absolute top-0 left-0 right-0 z-50 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-2xl font-bold">Mini Réseau Social</div>
                <div class="space-x-4">
                    <a href="/" class="btn btn-outline-light hover:bg-white hover:text-blue-900 transition duration-300">Accueil</a>
                    <a href="/contact" class="btn btn-outline-light hover:bg-white hover:text-blue-900 transition duration-300">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="container mx-auto px-4 pt-32 pb-20">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">
                    À propos de nous
                </h1>
                <p class="text-xl md:text-2xl mb-12 text-blue-100 animate-fade-in-delay">
                    Une équipe passionnée de développement web à l'EAFC de Uccle
                </p>
            </div>
        </div>

        <!-- Project Section -->
        <div class="container mx-auto px-4 py-20">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 mb-12">
                    <h2 class="text-3xl font-bold mb-6">Notre Projet</h2>
                    <p class="text-lg mb-6">
                        Mini Réseau Social est une plateforme innovante développée dans le cadre de notre formation à l'EAFC de Uccle.
                        Notre objectif est de créer un espace numérique où les utilisateurs peuvent se connecter, partager et interagir
                        de manière sécurisée et intuitive.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="feature-card">
                            <h3 class="text-xl font-bold mb-3">Objectifs</h3>
                            <ul class="space-y-2">
                                <li>• Inscription et gestion de profil simplifiée</li>
                                <li>• Processus d'inscription guidé et intuitif</li>
                                <li>• Administration efficace des utilisateurs</li>
                                <li>• Intégration de Google Maps pour la localisation</li>
                                <li>• Système sécurisé et évolutif</li>
                            </ul>
                        </div>
                        <div class="feature-card">
                            <h3 class="text-xl font-bold mb-3">Technologies</h3>
                            <ul class="space-y-2">
                                <li>• Laravel - Framework PHP robuste</li>
                                <li>• Vue.js - Interface utilisateur réactive</li>
                                <li>• Bootstrap - Design responsive</li>
                                <li>• Google Maps API - Localisation</li>
                                <li>• Architecture MVC - Organisation optimale</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Team Section -->
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8">
                    <h2 class="text-3xl font-bold mb-6">Notre Équipe</h2>
                    <p class="text-lg mb-8">
                        Ce projet est le fruit du travail de trois étudiants passionnés de développement web,
                        supervisés par Monsieur Anas Zemmouri à l'EAFC de Uccle.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="team-card text-center">
                            <div class="text-4xl mb-4">👨‍💻</div>
                            <h3 class="text-xl font-bold mb-2">Kenfack romaric</h3>
                            <p class="text-blue-100">etudiant en informatique de gestion a l'EAFC</p>
                        </div>
                        <div class="team-card text-center">
                            <div class="text-4xl mb-4">👨‍💻</div>
                            <h3 class="text-xl font-bold mb-2">Keuni Kevine</h3>
                            <p class="text-blue-100">Développeur Front-End</p>
                        </div>
                        <div class="team-card text-center">
                            <div class="text-4xl mb-4">👨‍💻</div>
                            <h3 class="text-xl font-bold mb-2">Aime tchato</h3>
                            <p class="text-blue-100">Développeur Back-End</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-black bg-opacity-30 py-8">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <p class="text-blue-100">&copy; 2024 Mini Réseau Social. Tous droits réservés.</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="/contact" class="text-blue-100 hover:text-white transition duration-300">Contact</a>
                        <a href="/privacy" class="text-blue-100 hover:text-white transition duration-300">Confidentialité</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-fade-in-delay {
    animation: fadeIn 1s ease-out 0.3s both;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.feature-card {
    background: rgba(255, 255, 255, 0.05);
    padding: 1.5rem;
    border-radius: 0.75rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.team-card {
    background: rgba(255, 255, 255, 0.05);
    padding: 2rem;
    border-radius: 0.75rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
}

.team-card:hover {
    transform: translateY(-5px);
}

.btn {
    @apply inline-block px-6 py-2 rounded-full font-medium transition-all duration-300;
}

.btn-outline-light {
    @apply border-2 border-white text-white hover:bg-white hover:text-blue-900;
}
</style>
