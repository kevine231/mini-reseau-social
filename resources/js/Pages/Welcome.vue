<template>
    <div class="container py-5">
        <header class="mb-5 text-center">
            <h1>Bienvenue sur notre Réseau Social !</h1>
            <p class="lead">Rejoignez-nous et connectez-vous avec des gens qui partagent vos intérêts.</p>
        </header>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm p-4">
                    <h2>À propos</h2>
                    <p>Notre réseau social vous permet de créer des groupes, partager vos idées et interagir avec d'autres utilisateurs dans un environnement sécurisé.</p>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm p-4">
                    <h2>Contactez-nous</h2>
                    <form @submit.prevent="submitForm">
                        <div class="mb-3">
                            <input v-model="form.name" type="text" class="form-control" placeholder="Votre nom" required />
                        </div>
                        <div class="mb-3">
                            <input v-model="form.email" type="email" class="form-control" placeholder="Votre email" required />
                        </div>
                        <div class="mb-3">
                            <textarea v-model="form.message" class="form-control" placeholder="Votre message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="/register" class="btn btn-success">Créer un compte</a>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const form = ref({
    name: '',
    email: '',
    message: '',
})

const submitForm = () => {
    alert('Formulaire envoyé ! 🚀 (fonctionnalité backend à implémenter)');
}
</script>
