<template>
    <div class="container py-5">
        <header class="text-center mb-5">
            <h1 class="display-4">Contactez-nous</h1>
            <p class="lead">Nous serions ravis d'avoir de vos nouvelles ! Remplissez le formulaire ci-dessous.</p>
        </header>

        <form class="mx-auto" style="max-width: 600px;">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" id="name" v-model="form.name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" id="email" v-model="form.email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea id="message" v-model="form.message" rows="5" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100" @click.prevent="submitForm">Envoyer</button>
        </form>
    </div>
</template>

<script setup>
import { reactive } from 'vue';

const form = reactive({
    name: '',
    email: '',
    message: ''
});

function submitForm() {
    alert(`Merci ${form.name} ! Votre message a bien été envoyé.`);
    // Ici, tu pourras connecter à une API plus tard si besoin
    form.name = '';
    form.email = '';
    form.message = '';
}
</script>

<style scoped>
h1 {
    color: #0d6efd;
}
</style>
