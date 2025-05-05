<template>
    <div class="landing-page min-h-screen bg-gradient-to-br from-blue-900 to-purple-900 relative text-white">
        <!-- Navigation -->
        <nav class="absolute top-0 left-0 right-0 z-50 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-2xl font-bold">Mini Réseau Social</div>
                <div class="space-x-4">
                    <a href="/login" class="btn btn-outline-light hover:bg-white hover:text-blue-900 transition duration-300">Se connecter</a>
                    <a href="/register" class="btn btn-primary bg-white text-blue-900 hover:bg-blue-100 transition duration-300">S'inscrire</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="container mx-auto px-4 pt-32 pb-20">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">
                    Bienvenue sur Mini Réseau Social
                </h1>
                <p class="text-xl md:text-2xl mb-12 text-blue-100 animate-fade-in-delay">
                    Partagez, échangez et grandissez ensemble dans un environnement sécurisé et bienveillant.
                </p>
                <div class="flex justify-center space-x-4 animate-fade-in-delay-2">
                    <a href="/register" class="btn btn-primary bg-white text-blue-900 px-8 py-3 rounded-full hover:bg-blue-100 transition duration-300">
                        Commencer maintenant
                    </a>
                    <a href="/about" class="btn btn-outline-light px-8 py-3 rounded-full hover:bg-white hover:text-blue-900 transition duration-300">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="container mx-auto px-4 py-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="feature-card bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 transform hover:scale-105 transition duration-300">
                    <div class="text-4xl mb-4">🚀</div>
                    <h3 class="text-xl font-bold mb-4">Inscription Rapide</h3>
                    <p class="text-blue-100">Créez votre compte en quelques clics et accédez à toutes les fonctionnalités de notre réseau social.</p>
                </div>
                <div class="feature-card bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 transform hover:scale-105 transition duration-300">
                    <div class="text-4xl mb-4">👥</div>
                    <h3 class="text-xl font-bold mb-4">Groupes & Discussions</h3>
                    <p class="text-blue-100">Rejoignez des groupes thématiques et participez à des discussions enrichissantes.</p>
                </div>
                <div class="feature-card bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 transform hover:scale-105 transition duration-300">
                    <div class="text-4xl mb-4">🔒</div>
                    <h3 class="text-xl font-bold mb-4">Sécurité & Respect</h3>
                    <p class="text-blue-100">Un espace sécurisé et bienveillant où chacun peut s'exprimer librement.</p>
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
                        <a href="/about" class="text-blue-100 hover:text-white transition duration-300">À propos</a>
                        <a href="/privacy" class="text-blue-100 hover:text-white transition duration-300">Confidentialité</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-fade-in-delay {
    animation: fadeIn 1s ease-out 0.3s both;
}

.animate-fade-in-delay-2 {
    animation: fadeIn 1s ease-out 0.6s both;
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
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.btn {
    @apply inline-block px-6 py-2 rounded-full font-medium transition-all duration-300;
}

.btn-primary {
    @apply bg-white text-blue-900 hover:bg-blue-100;
}

.btn-outline-light {
    @apply border-2 border-white text-white hover:bg-white hover:text-blue-900;
}
</style>
