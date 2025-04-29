<template>
    <div
        class="landing-page min-h-screen bg-cover bg-center position-relative text-white"
        style="background-image: url('https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?auto=format&fit=crop&w=1470&q=80');"
    >
        <!-- Boutons en haut à gauche -->
        <div class="position-absolute top-0 start-0 p-4 d-flex gap-3">
            <a href="/login" class="btn btn-outline-light">Se connecter</a>
            <a href="/register" class="btn btn-primary">S'inscrire</a>
        </div>

        <!-- Contenu principal -->
        <div class="container py-5 text-center">
            <header class="mb-10">
                <h1 class="fw-bold text-4xl md:text-5xl mb-3">Bienvenue sur Mini Réseau Social</h1>
                <p class="text-lg md:text-xl">Partagez, échangez et grandissez ensemble.</p>
            </header>

            <!-- Section d'informations -->
            <section
                class="row text-center text-dark bg-light bg-opacity-75 rounded-4 p-4 mx-auto"
                style="max-width: 1000px;"
            >
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-sm">Inscription Rapide</h5>
                            <p class="card-text text-sm">Inscrivez-vous et accédez à toutes les fonctionnalités.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-sm">Groupes & Discussions</h5>
                            <p class="card-text text-sm">Rejoignez des groupes et échangez facilement.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-sm">Sécurité & Respect</h5>
                            <p class="card-text text-sm">Un espace sécurisé et bienveillant pour tous.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="d-flex justify-between align-items-center mt-5">
                <div>
                    <p>&copy; 2025 Mini Réseau Social. Tous droits réservés.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="/contact" class="btn btn-outline-light">Contactez-nous</a>
                </div>
            </footer>
        </div>

        <!-- Bouton à propos en bas à droite -->
        <div class="position-absolute bottom-0 end-0 p-4">
            <a href="/about" class="btn btn-outline-light">À propos</a>
        </div>
    </div>
</template>

<script setup>
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
</script>

<style scoped>
h1 {
    color: white;
}
</style>
